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

            if ($this->shouldRetryWithStartTls($this->lastSendError) && $this->sendUsingStartTlsFallback($to, $subject, $body, $toName)) {
                return true;
            }

            if ($this->shouldRetryWithStartTls($this->lastSendError) && $this->sendUsingIpv4Fallback($to, $subject, $body, $toName)) {
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

            if ($this->shouldRetryWithStartTls($this->lastSendError) && $this->sendUsingStartTlsFallback($to, $subject, $body, $toName)) {
                return true;
            }

            if ($this->shouldRetryWithStartTls($this->lastSendError) && $this->sendUsingIpv4Fallback($to, $subject, $body, $toName)) {
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

    private function shouldRetryWithStartTls(?string $errorMessage): bool
    {
        if ($errorMessage === null || $errorMessage === '') {
            return false;
        }

        $message = strtolower($errorMessage);
        $timedOut = str_contains($message, 'connection timed out') || str_contains($message, 'smtp code: 110');
        $connectFailure = str_contains($message, 'could not connect to smtp host') || str_contains($message, 'failed to connect to server');

        return $timedOut && $connectFailure;
    }

    private function sendUsingStartTlsFallback(string $to, string $subject, string $body, ?string $toName): bool
    {
        if ($this->mailConfig->host === '') {
            return false;
        }

        if (strtolower($this->mailConfig->encryption) === 'tls' || strtolower($this->mailConfig->encryption) === 'starttls') {
            return false;
        }

        if ($this->mailConfig->port === 587 && strtolower($this->mailConfig->encryption) !== 'ssl' && strtolower($this->mailConfig->encryption) !== 'smtps') {
            return false;
        }

        $this->mailer->Port = 587;
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        try {
            if (!$this->sendWithCurrentTransport($to, $subject, $body, $toName)) {
                $fallbackError = $this->mailer->ErrorInfo !== ''
                  ? $this->mailer->ErrorInfo
                  : 'PHPMailer returned false without an error message during STARTTLS fallback.';
                $this->lastSendError .= ' | STARTTLS fallback failed: ' . $fallbackError;
                return false;
            }

            error_log('[email] STARTTLS fallback succeeded after SMTP timeout on ' . $this->mailConfig->host . '.');
            return true;
        } catch (Throwable $e) {
            $fallbackError = trim($this->mailer->ErrorInfo);
            $errorMessage = $e->getMessage();
            if ($fallbackError !== '' && !str_contains($errorMessage, $fallbackError)) {
                $errorMessage .= ' (PHPMailer: ' . $fallbackError . ')';
            }

            $this->lastSendError .= ' | STARTTLS fallback exception: ' . $errorMessage;
            return false;
        }
    }

    private function sendUsingIpv4Fallback(string $to, string $subject, string $body, ?string $toName): bool
    {
        if ($this->mailConfig->host === '') {
            return false;
        }

        $originalHost = $this->mailConfig->host;
        $resolvedHost = gethostbyname($originalHost);

        if ($resolvedHost === '' || $resolvedHost === $originalHost) {
            return false;
        }

        $this->mailer->Host = $resolvedHost;
        $this->mailer->Port = 587;
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->SMTPOptions = [
            'ssl' => [
                'peer_name' => $originalHost,
                'verify_peer' => true,
                'verify_peer_name' => true,
                'allow_self_signed' => false,
            ],
        ];

        try {
            if (!$this->sendWithCurrentTransport($to, $subject, $body, $toName)) {
                $fallbackError = $this->mailer->ErrorInfo !== ''
                  ? $this->mailer->ErrorInfo
                  : 'PHPMailer returned false without an error message during IPv4 fallback.';
                $this->lastSendError .= ' | IPv4 fallback failed: ' . $fallbackError;
                return false;
            }

            error_log('[email] IPv4 STARTTLS fallback succeeded using ' . $resolvedHost . ' for ' . $originalHost . '.');
            return true;
        } catch (Throwable $e) {
            $fallbackError = trim($this->mailer->ErrorInfo);
            $errorMessage = $e->getMessage();
            if ($fallbackError !== '' && !str_contains($errorMessage, $fallbackError)) {
                $errorMessage .= ' (PHPMailer: ' . $fallbackError . ')';
            }

            $this->lastSendError .= ' | IPv4 fallback exception: ' . $errorMessage;
            return false;
        } finally {
            $this->mailer->Host = $originalHost;
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

        $secure = $this->mailConfig->encryption;
        if ($secure === 'tls' || $secure === 'starttls') {
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            return;
        }

        if ($secure === 'ssl' || $secure === 'smtps') {
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }
    }

}
