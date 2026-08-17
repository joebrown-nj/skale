<?php

declare(strict_types=1);

namespace Tests\Core\Services;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Services\EmailQueueService;
use PHPUnit\Framework\TestCase;

final class EmailQueueServiceTest extends TestCase
{
    private ?string $originalQueueDir = null;
    private ?string $originalQueueEnabled = null;
    private ?string $originalMaxAttempts = null;
    private string $queueDir;

    protected function setUp(): void
    {
        $this->originalQueueDir = $_ENV['EMAIL_QUEUE_DIR'] ?? null;
        $this->originalQueueEnabled = $_ENV['EMAIL_QUEUE_ENABLED'] ?? null;
        $this->originalMaxAttempts = $_ENV['EMAIL_QUEUE_MAX_ATTEMPTS'] ?? null;
        $this->queueDir = sys_get_temp_dir() . '/skaleup-email-queue-' . bin2hex(random_bytes(8));

        $_ENV['EMAIL_QUEUE_DIR'] = $this->queueDir;
        $_ENV['EMAIL_QUEUE_ENABLED'] = '1';
        unset($_ENV['EMAIL_QUEUE_MAX_ATTEMPTS']);
    }

    protected function tearDown(): void
    {
        $this->restoreEnv('EMAIL_QUEUE_DIR', $this->originalQueueDir);
        $this->restoreEnv('EMAIL_QUEUE_ENABLED', $this->originalQueueEnabled);
        $this->restoreEnv('EMAIL_QUEUE_MAX_ATTEMPTS', $this->originalMaxAttempts);
        $this->removeDirectory($this->queueDir);
    }

    public function testProcessPendingSendsQueuedEmail(): void
    {
        $emailService = $this->createMock(EmailServiceInterface::class);
        $emailService->expects($this->once())
            ->method('sendEmail')
            ->with('lead@example.com', 'New lead', '<p>Hello</p>', 'Lead User')
            ->willReturn(true);

        $queue = new EmailQueueService($emailService);

        $this->assertTrue(
            $queue->enqueueEmail('lead@example.com', 'New lead', '<p>Hello</p>', 'Lead User'),
        );

        $summary = $queue->processPending();

        $this->assertSame(1, $summary['claimed']);
        $this->assertSame(1, $summary['sent']);
        $this->assertSame([], glob($this->queueDir . '/pending/*.json') ?: []);
        $this->assertCount(1, glob($this->queueDir . '/sent/*.json') ?: []);
    }

    public function testProcessPendingRetriesFailedEmail(): void
    {
        $_ENV['EMAIL_QUEUE_MAX_ATTEMPTS'] = '3';

        $emailService = $this->createMock(EmailServiceInterface::class);
        $emailService->expects($this->once())
            ->method('sendEmail')
            ->with('lead@example.com', 'New lead', '<p>Hello</p>', null)
            ->willReturn(false);
        $emailService->method('getLastSendError')
            ->willReturn('SMTP authentication failed.');

        $queue = new EmailQueueService($emailService);

        $this->assertTrue(
            $queue->enqueueEmail('lead@example.com', 'New lead', '<p>Hello</p>'),
        );

        $summary = $queue->processPending();

        $this->assertSame(1, $summary['claimed']);
        $this->assertSame(1, $summary['retried']);
        $pendingFiles = glob($this->queueDir . '/pending/*.json') ?: [];

        $this->assertCount(1, $pendingFiles);

        $payload = json_decode((string) file_get_contents($pendingFiles[0]), true);

        $this->assertSame(1, $payload['attempts']);
        $this->assertGreaterThan(time(), $payload['available_at']);
        $this->assertSame('SMTP authentication failed.', $payload['last_error']);
    }

    private function restoreEnv(string $key, ?string $value): void
    {
        if ($value === null) {
            unset($_ENV[$key]);
            return;
        }

        $_ENV[$key] = $value;
    }

    private function removeDirectory(string $path): void
    {
        if (!is_dir($path)) {
            return;
        }

        $items = scandir($path);

        if ($items === false) {
            return;
        }

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $itemPath = $path . '/' . $item;

            if (is_dir($itemPath)) {
                $this->removeDirectory($itemPath);
                continue;
            }

            @unlink($itemPath);
        }

        @rmdir($path);
    }
}
