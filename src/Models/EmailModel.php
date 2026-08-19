<?php

namespace App\Models;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Config\MailConfig;
use App\Core\Config\SiteConfig;
use App\Models\Entities\EmailListSignupsEntity;
use Doctrine\ORM\EntityManager;
use PHPMailer\PHPMailer\PHPMailer;
use Throwable;

class EmailModel implements EmailServiceInterface
{
    private const SMTP_TIMEOUT_SECONDS = 20;
    private const SMTP_CONNECTION_TIMEOUT_SECONDS = 30;

    protected PHPMailer $mailer;
    private EntityManager $entityManager;
    private ?string $lastSendError = null;
    private MailConfig $mailConfig;
    private SiteConfig $siteConfig;

    public function __construct(EntityManager $entityManager, PHPMailer $mailer, MailConfig $mailConfig, SiteConfig $siteConfig)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->mailConfig = $mailConfig;
        $this->siteConfig = $siteConfig;
        $this->configureTransport();

        //Recipients
        $this->mailer->setFrom($mailConfig->fromAddress, $siteConfig->name);
        // $this->mailer->addAddress($recipient, $recipientName);           //Add a recipient
        // $this->mailer->addAddress('ellen@example.com');               //Name is optional
        $this->mailer->addReplyTo($mailConfig->replyToAddress, $siteConfig->name);
        // $this->mailer->addCC('cc@example.com');
        // $this->mailer->addBCC('bcc@example.com');
    }

    /**
     * Send an email.
     *
     * @param string $to Recipient email address
     * @param string $subject Email subject
     * @param string $body Email body (HTML allowed)
     * @param string $from Sender email address
     * @param string|null $fromName Sender name
     * @return bool
     */
    public function sendEmail(string $to, string $subject, string $body, ?string $toName = null): bool
    {
        $this->lastSendError = null;

        try {
            if ($this->sendWithCurrentTransport($to, $subject, $body, $toName)) {
                return true;
            }

            $this->lastSendError = $this->mailer->ErrorInfo !== ''
                ? $this->mailer->ErrorInfo
                : 'PHPMailer returned false without an error message.';
            $this->lastSendError = $this->transportLabel() . ': ' . $this->lastSendError;

            if ($this->isConnectionFailure($this->lastSendError) && $this->sendUsingFallbackTransport($to, $subject, $body, $toName)) {
                return true;
            }

            error_log('[email] Send failed for ' . $this->redactEmail($to) . ': ' . $this->lastSendError);

            return false;
        } catch (Throwable $e) {
            $mailerError = trim($this->mailer->ErrorInfo);
            $this->lastSendError = $e->getMessage();
            if ($mailerError !== '' && !str_contains($this->lastSendError, $mailerError)) {
                $this->lastSendError .= ' (PHPMailer: ' . $mailerError . ')';
            }
            $this->lastSendError = $this->transportLabel() . ': ' . $this->lastSendError;

            if ($this->isConnectionFailure($this->lastSendError) && $this->sendUsingFallbackTransport($to, $subject, $body, $toName)) {
                return true;
            }

            error_log('[email] Send failed for ' . $this->redactEmail($to) . ': ' . $this->lastSendError);
            return false;
        }
    }

    private function sendWithCurrentTransport(string $to, string $subject, string $body, ?string $toName): bool
    {
        $this->mailer->clearAllRecipients();
        $this->mailer->clearAttachments();
        $this->mailer->isHTML(true);
        $this->mailer->addAddress($to, $toName);
        $this->mailer->Subject = $subject;
        $this->mailer->Body = $body;

        try {
            return $this->mailer->send();
        } finally {
            if ($this->mailer->isSMTP()) {
                try {
                    $this->mailer->smtpClose();
                } catch (Throwable $exception) {
                    error_log('[email] SMTP close failed: ' . $exception->getMessage());
                }
            }
        }
    }

    private function isConnectionFailure(?string $errorMessage): bool
    {
        if ($errorMessage === null || $errorMessage === '') {
            return false;
        }

        $message = strtolower($errorMessage);
        return str_contains($message, 'could not connect to smtp host')
            || str_contains($message, 'failed to connect to server')
            || str_contains($message, 'connection timed out')
            || str_contains($message, 'smtp code: 110');
    }

    private function sendUsingFallbackTransport(string $to, string $subject, string $body, ?string $toName): bool
    {
        if ($this->mailConfig->host === '') {
            return false;
        }

        $useStartTls = $this->mailConfig->port !== 587
            || !in_array(strtolower($this->mailConfig->encryption), ['tls', 'starttls'], true);
        $this->configureSmtpEndpoint(
            $useStartTls ? 587 : 465,
            $useStartTls ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS,
        );
        $fallbackName = $useStartTls ? 'TLS/587' : 'SSL/465';

        try {
            if (!$this->sendWithCurrentTransport($to, $subject, $body, $toName)) {
                $fallbackError = $this->mailer->ErrorInfo !== ''
                  ? $this->mailer->ErrorInfo
                  : 'PHPMailer returned false without an error message.';
                $this->lastSendError .= ' | ' . $fallbackName . ' fallback failed: ' . $fallbackError;
                return false;
            }

            error_log('[email] ' . $fallbackName . ' fallback succeeded on ' . $this->mailConfig->host . '.');
            return true;
        } catch (Throwable $e) {
            $fallbackError = trim($this->mailer->ErrorInfo);
            $errorMessage = $e->getMessage();
            if ($fallbackError !== '' && !str_contains($errorMessage, $fallbackError)) {
                $errorMessage .= ' (PHPMailer: ' . $fallbackError . ')';
            }

            $this->lastSendError .= ' | ' . $fallbackName . ' fallback failed: ' . $errorMessage;
            return false;
        }
    }

    public function getLastSendError(): ?string
    {
        return $this->lastSendError;
    }

    private function redactEmail(string $email): string
    {
        $at = strrpos($email, '@');
        if ($at === false) {
            return '[invalid address]';
        }

        return substr($email, 0, 1) . '***' . substr($email, $at);
    }

    public function emailListUnsubscribe(string $email): bool
    {
        try {
            $signup = $this->entityManager
                ->getRepository(EmailListSignupsEntity::class)
                ->findOneBy(['email' => $email]);

            if ($signup === null) {
                return false;
            }

            $this->entityManager->remove($signup);
            $this->entityManager->flush();

            return true;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function processEmailListSignup(array $data): bool
    {
        try {
            $email = new EmailListSignupsEntity();
            $email->setemail($data['email']);
            $email->setuserInfo($data['userInfo'] ?? null);

            $this->entityManager->persist($email);
            $this->entityManager->flush();
            return true;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function checkIfEmailIsOnList(string $email): bool
    {
        $exists = $this->entityManager->getRepository(EmailListSignupsEntity::class)->findOneBy(['email' => $email]);
        if ($exists) {
            return true;
        }
        return false;
    }

    public function validateEmail(string $email): bool
    {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function emailListSignup(array $data, ?array $user): bool
    {
        $email = $data['email'] ?? '';

        if (!$this->validateEmail($email)) {
            return false;
        }

        if ($this->checkIfEmailIsOnList($email)) {
            return false;
        }

        $payload = [
            'email' => $email,
            'userInfo' => json_encode($user),
        ];

        return $this->processEmailListSignup($payload);
    }

    private function configureTransport(): void
    {
        $host = $this->mailConfig->host;
        if ($host === '') {
            return;
        }

        $this->mailer->isSMTP();
        $this->mailer->Host = $host;
        $this->mailer->SMTPAuth = $this->mailConfig->authentication;
        $this->mailer->Username = $this->mailConfig->username;
        $this->mailer->Password = $this->mailConfig->password;
        $this->mailer->Port = $this->mailConfig->port;
        $this->mailer->Timeout = self::SMTP_TIMEOUT_SECONDS;

        $smtp = $this->mailer->getSMTPInstance();
        $smtp->Timeout = self::SMTP_TIMEOUT_SECONDS;
        $smtp->Timelimit = self::SMTP_CONNECTION_TIMEOUT_SECONDS;

        $this->mailer->SMTPKeepAlive = false;
        $this->mailer->CharSet = 'UTF-8';

        $secure = strtolower($this->mailConfig->encryption);
        if ($secure === 'tls' || $secure === 'starttls') {
            $this->configureSmtpEndpoint($this->mailConfig->port, PHPMailer::ENCRYPTION_STARTTLS);
            return;
        }

        if ($secure === 'ssl' || $secure === 'smtps') {
            $this->configureSmtpEndpoint($this->mailConfig->port, PHPMailer::ENCRYPTION_SMTPS);
        }
    }

    private function configureSmtpEndpoint(int $port, string $encryption): void
    {
        $this->mailer->Port = $port;
        $this->mailer->SMTPSecure = $encryption;
        $this->mailer->SMTPAutoTLS = false;
    }

    private function transportLabel(): string
    {
        return sprintf('SMTP %s:%d', $this->mailer->Host, $this->mailer->Port);
    }

}
