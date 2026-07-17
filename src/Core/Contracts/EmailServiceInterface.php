<?php
declare(strict_types=1);

namespace App\Core\Contracts;

interface EmailServiceInterface
{
    public function sendEmail(string $to, string $subject, string $body, ?string $toName = null): bool;
    public function getLastSendError(): ?string;
    public function emailTemplate(string $content = '', string $email = ''): string;
    public function validateEmail(string $email): bool;
    public function checkIfEmailIsOnList(string $email): bool;
    public function processEmailListSignup(array $data): bool;
    public function emailListSignup(array $data, ?array $user): bool;
    public function emailListUnsubscribe(string $email): bool;
}
