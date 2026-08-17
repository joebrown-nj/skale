<?php

declare(strict_types=1);

namespace App\Core\Services;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Config\EmailQueueConfig;
use RuntimeException;
use Throwable;

class EmailQueueService
{
    private const DEFAULT_MAX_ATTEMPTS = 5;
    private const DEFAULT_PROCESSING_TIMEOUT = 900;

    private EmailServiceInterface $emailService;
    private string $queueRoot;
    private EmailQueueConfig $config;

    public function __construct(EmailServiceInterface $emailService, ?EmailQueueConfig $config = null)
    {
        $this->emailService = $emailService;
        $config ??= new EmailQueueConfig(
            enabled: filter_var($_ENV['EMAIL_QUEUE_ENABLED'] ?? false, FILTER_VALIDATE_BOOL),
            directory: (string) ($_ENV['EMAIL_QUEUE_DIR'] ?? dirname(__DIR__, 3) . '/var/email-queue'),
            maxAttempts: max(1, (int) ($_ENV['EMAIL_QUEUE_MAX_ATTEMPTS'] ?? self::DEFAULT_MAX_ATTEMPTS)),
            processingTimeout: max(60, (int) ($_ENV['EMAIL_QUEUE_PROCESSING_TIMEOUT'] ?? self::DEFAULT_PROCESSING_TIMEOUT)),
        );
        $this->config = $config;
        $this->queueRoot = $config->directory;
    }

    public function isEnabled(): bool
    {
        return $this->config->enabled;
    }

    public function enqueueEmail(string $to, string $subject, string $body, ?string $toName = null): bool
    {
        try {
            $this->ensureDirectoriesExist();

            $jobId = bin2hex(random_bytes(16));
            $pendingPath = $this->pathFor('pending', $jobId);
            $tempPath = $pendingPath . '.tmp';

            $job = [
                'id' => $jobId,
                'to' => $to,
                'to_name' => $toName,
                'subject' => $subject,
                'body' => $body,
                'attempts' => 0,
                'available_at' => time(),
                'created_at' => gmdate(DATE_ATOM),
            ];

            $this->writeJobFile($tempPath, $job);

            if (!@rename($tempPath, $pendingPath)) {
                @unlink($tempPath);
                throw new RuntimeException('Unable to move queued email into the pending directory.');
            }

            return true;
        } catch (Throwable $exception) {
            error_log('[email-queue] ' . $exception->getMessage());

            return false;
        }
    }

    public function processPending(int $limit = 10): array
    {
        $lockHandle = $this->acquireProcessingLock();
        if ($lockHandle === null) {
            return [
                'claimed' => 0,
                'sent' => 0,
                'retried' => 0,
                'failed' => 0,
                'deferred' => 0,
            ];
        }

        try {
            $this->ensureDirectoriesExist();
            $this->recoverStaleProcessingJobs();

            $summary = [
                'claimed' => 0,
                'sent' => 0,
                'retried' => 0,
                'failed' => 0,
                'deferred' => 0,
            ];

            $pendingFiles = glob($this->directoryFor('pending') . '/*.json') ?: [];
            sort($pendingFiles, SORT_STRING);

            foreach ($pendingFiles as $pendingPath) {
                if ($summary['claimed'] >= $limit) {
                    break;
                }

                $processingPath = $this->pathFor('processing', basename($pendingPath, '.json'));

                if (!@rename($pendingPath, $processingPath)) {
                    continue;
                }

                $summary['claimed']++;
                try {
                    $result = $this->processClaimedJob($processingPath);
                } catch (Throwable $exception) {
                    error_log('[email-queue] ' . $exception->getMessage());
                    $this->attemptMoveToFailed($processingPath);
                    $result = 'failed';
                }

                $summary[$result]++;
            }

            return $summary;
        } finally {
            $this->releaseProcessingLock($lockHandle);
        }
    }

    private function processClaimedJob(string $processingPath): string
    {
        try {
            $job = $this->readJobFile($processingPath);
        } catch (Throwable $exception) {
            error_log('[email-queue] ' . $exception->getMessage());
            $this->moveToDirectory($processingPath, 'failed');

            return 'failed';
        }

        if ((int) ($job['available_at'] ?? 0) > time()) {
            $this->moveToDirectory($processingPath, 'pending');

            return 'deferred';
        }

        $sent = $this->emailService->sendEmail(
            (string) $job['to'],
            (string) $job['subject'],
            (string) $job['body'],
            $job['to_name'] !== null ? (string) $job['to_name'] : null,
        );

        if ($sent) {
            unset($job['last_error']);
            $this->moveToDirectory($processingPath, 'sent');

            return 'sent';
        }

        $attempts = ((int) ($job['attempts'] ?? 0)) + 1;
        $job['attempts'] = $attempts;
        $job['available_at'] = time() + $this->retryDelayInSeconds($attempts);
        $job['last_attempt_at'] = gmdate(DATE_ATOM);
        $job['last_error'] = $this->emailService->getLastSendError()
            ?? 'Email service returned false without an error message.';

        error_log(sprintf(
            '[email-queue] Job %s failed on attempt %d/%d: %s',
            (string) ($job['id'] ?? basename($processingPath, '.json')),
            $attempts,
            $this->maxAttempts(),
            $job['last_error'],
        ));

        $this->writeJobFile($processingPath, $job);

        if ($attempts >= $this->maxAttempts()) {
            $this->moveToDirectory($processingPath, 'failed');

            return 'failed';
        }

        $this->moveToDirectory($processingPath, 'pending');

        return 'retried';
    }

    private function ensureDirectoriesExist(): void
    {
        foreach (['pending', 'processing', 'sent', 'failed'] as $directory) {
            $path = $this->directoryFor($directory);

            if (is_dir($path)) {
                continue;
            }

            if (!@mkdir($path, 0777, true) && !is_dir($path)) {
                throw new RuntimeException('Unable to create queue directory: ' . $path);
            }
        }
    }

    private function recoverStaleProcessingJobs(): void
    {
        $cutoff = time() - $this->processingTimeout();
        $processingFiles = glob($this->directoryFor('processing') . '/*.json') ?: [];

        foreach ($processingFiles as $processingPath) {
            $modifiedAt = @filemtime($processingPath);
            if ($modifiedAt === false || $modifiedAt > $cutoff) {
                continue;
            }

            try {
                $this->moveToDirectory($processingPath, 'pending');
                error_log('[email-queue] Recovered stale processing job ' . basename($processingPath));
            } catch (Throwable $exception) {
                error_log('[email-queue] Unable to recover stale job: ' . $exception->getMessage());
            }
        }
    }

    private function directoryFor(string $state): string
    {
        return $this->queueRoot . '/' . $state;
    }

    private function pathFor(string $state, string $jobId): string
    {
        return $this->directoryFor($state) . '/' . $jobId . '.json';
    }

    private function acquireProcessingLock(): mixed
    {
        $lockPath = $this->queueRoot . '/.lock';
        $handle = @fopen($lockPath, 'c+');

        if ($handle === false) {
            return null;
        }

        if (!@flock($handle, LOCK_EX | LOCK_NB)) {
            @fclose($handle);
            return null;
        }

        return $handle;
    }

    private function releaseProcessingLock(mixed $handle): void
    {
        if (!is_resource($handle)) {
            return;
        }

        @flock($handle, LOCK_UN);
        @fclose($handle);
    }

    private function readJobFile(string $path): array
    {
        $contents = @file_get_contents($path);

        if ($contents === false) {
            throw new RuntimeException('Unable to read email queue job: ' . $path);
        }

        $job = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

        if (!is_array($job)) {
            throw new RuntimeException('Email queue job payload is invalid: ' . $path);
        }

        return $job;
    }

    private function writeJobFile(string $path, array $job): void
    {
        $encoded = json_encode($job, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);

        if (@file_put_contents($path, $encoded, LOCK_EX) === false) {
            throw new RuntimeException('Unable to write email queue job: ' . $path);
        }
    }

    private function moveToDirectory(string $fromPath, string $state): void
    {
        $destination = $this->directoryFor($state) . '/' . basename($fromPath);

        if (@rename($fromPath, $destination)) {
            return;
        }

        throw new RuntimeException(
            sprintf('Unable to move email queue job from "%s" to "%s".', $fromPath, $destination),
        );
    }

    private function attemptMoveToFailed(string $processingPath): void
    {
        if (!is_file($processingPath)) {
            return;
        }

        try {
            $this->moveToDirectory($processingPath, 'failed');
        } catch (Throwable $exception) {
            error_log('[email-queue] ' . $exception->getMessage());
        }
    }

    private function retryDelayInSeconds(int $attempts): int
    {
        return min(300 * $attempts, 1800);
    }

    private function maxAttempts(): int
    {
        return $this->config->maxAttempts;
    }

    private function processingTimeout(): int
    {
        return $this->config->processingTimeout;
    }
}
