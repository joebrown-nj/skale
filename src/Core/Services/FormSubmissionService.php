<?php
declare(strict_types=1);

namespace App\Core\Services;

use App\Core\Config\MailConfig;
use App\Core\Config\SiteConfig;
use App\Core\Contracts\EmailServiceInterface;

class FormSubmissionService
{
    private EmailServiceInterface $emailService;
    private EmailQueueService $emailQueueService;

    public function __construct(
        EmailServiceInterface $emailService,
        EmailQueueService $emailQueueService,
        private readonly SiteConfig $siteConfig,
        private readonly MailConfig $mailConfig,
    ) {
        $this->emailService = $emailService;
        $this->emailQueueService = $emailQueueService;
    }

    public function handleContactSubmission(array $input, ?array $user, ?array $server = null): void
    {
        if ($this->containsMaliciousInput($input)) {
            return;
        }

        $successMessage = ($input['form_type'] ?? '') === 'newsletter'
            ? '<p>Thanks for subscribing. We are glad to have you with us.</p>'
            : $this->buildContactSuccessMessage();

        $emailMessage = $this->emailService->emailTemplate(
            '<p>Hi '.$input['name'].',</p>'.$successMessage,
            $input['email']
        );

        $this->deliverEmail(
            $input['email'],
            ($input['form_type'] ?? '') === 'newsletter'
                ? 'Thanks for subscribing'
                : 'Thanks for contacting '.$this->siteConfig->name,
            $emailMessage,
            $input['name']
        );

        if (($input['subscribe'] ?? null) == 1) {
            $this->emailService->emailListSignup(
                ['email' => $input['email'], 'userInfo' => json_encode($user)],
                $user
            );
        }

        $adminEmailMessage = $this->emailService->emailTemplate(
            $this->buildAdminEmailBody($input, $user),
            $input['email']
        );

        $this->deliverEmail(
            $this->mailConfig->adminAddress,
            'New '.str_replace(['-', '_'], ' ', (string) ($input['form_type'] ?? 'contact')).' form submission',
            $adminEmailMessage
        );
    }

    public function handleGetStartedSubmission(array $input, ?array $user, ?array $server = null): void
    {
        if ($this->containsMaliciousInput($input)) {
            return;
        }

        $successMessage = $this->buildGetStartedSuccessMessage();

        $emailMessage = $this->emailService->emailTemplate(
            '<p>Hi '.$input['name'].',</p>'.$successMessage,
            $input['email']
        );

        $this->deliverEmail(
            $input['email'],
            'Thanks for filling out the contact form',
            $emailMessage,
            $input['name']
        );

        $adminEmailMessage = $this->emailService->emailTemplate(
            $this->buildAdminEmailBody($input, $user),
            $input['email']
        );

        $this->deliverEmail(
            $this->mailConfig->adminAddress,
            'Someone filled out the contact form',
            $adminEmailMessage
        );
    }

    public static function containsMaliciousInput(array $input): bool
    {
        foreach (self::flattenValues($input) as $value) {
            if (self::looksMalicious($value)) {
                return true;
            }
        }

        return false;
    }

    private function deliverEmail(string $to, string $subject, string $body, ?string $toName = null): void
    {
        if ($this->emailQueueService->isEnabled() && $this->emailQueueService->enqueueEmail($to, $subject, $body, $toName)) {
            return;
        }

        $this->emailService->sendEmail($to, $subject, $body, $toName);
    }

    /**
     * @return list<string>
     */
    private static function flattenValues(array $input): array
    {
        $values = [];

        foreach ($input as $value) {
            if (is_array($value)) {
                $values = [...$values, ...self::flattenValues($value)];
                continue;
            }

            if (is_string($value) || is_int($value) || is_float($value) || is_bool($value) || $value === null) {
                $values[] = trim((string) $value);
            }
        }

        return $values;
    }

    private static function looksMalicious(string $value): bool
    {
        $value = trim($value);

        if ($value === '') {
            return false;
        }

        $normalized = strtolower($value);

        if (preg_match('/<\s*(?:script|iframe|object|embed|svg|img|style|link|meta|base|form|input|button|textarea|select|option|video|audio|source|body|html)\b/i', $value) === 1) {
            return true;
        }

        if (preg_match('/(?:on[a-z]+\s*=|javascript\s*:|vbscript\s*:|data\s*:\s*(?:text\/html|image\/svg\+xml)|<\?php|<\?=|<\?\s*\w+)/i', $value) === 1) {
            return true;
        }

        if (preg_match('/(?:&lt;|&gt;)\s*(?:script|iframe|svg|img|object|embed|style|form)/i', $value) === 1) {
            return true;
        }

        if (preg_match('/(?:alert\s*\(|confirm\s*\(|prompt\s*\(|eval\s*\(|document\.cookie|localStorage|sessionStorage|window\.location|document\.write)/i', $value) === 1) {
            return true;
        }

        if (preg_match('/<\s*\/??\s*[a-z][a-z0-9-_]*\s*[^>]*>/i', $value) === 1 && preg_match('/(?:\b(?:script|iframe|svg|img|object|embed|style|form)\b|\b(?:on[a-z]+)\b)/i', $normalized) === 1) {
            return true;
        }

        return false;
    }

    private function buildContactSuccessMessage(): string
    {
        return '';
    }

    private function buildGetStartedSuccessMessage(): string
    {
        return '<p class="mb-0">Thanks we will be in touch soon, '.$this->siteConfig->name.'</p>';
    }

    private function buildAdminEmailBody(array $input, ?array $user): string
    {
        $message = '<p><strong>New form submission received.</strong></p>';
        $message .= '<h2 style="font-size:18px; margin:24px 0 12px;">Submitted Form Data</h2>';
        $message .= $this->buildDetailsList($this->normalizeFormInput($input));

        $userDetails = $this->normalizeUserDetails($user);

        if ($userDetails !== []) {
            $message .= '<h2 style="font-size:18px; margin:24px 0 12px;">User Information</h2>';
            $message .= $this->buildDetailsList($userDetails);
        }

        return $message;
    }

    private function normalizeFormInput(array $input): array
    {
        $details = [];

        foreach ($input as $key => $value) {
            $details[$this->formatLabel((string) $key)] = $this->stringifyValue($value);
        }

        return $details;
    }

    private function normalizeUserDetails(?array $user): array
    {
        if ($user === null) {
            return [];
        }

        $userFields = [
            'ipAddress' => 'IP Address',
            'city_name' => 'City',
            'region_name' => 'Region',
            'country_name' => 'Country',
        ];

        $details = [];

        foreach ($userFields as $key => $label) {
            if (!isset($user[$key]) || $user[$key] === '' || $user[$key] === '-') {
                continue;
            }

            $details[$label] = $this->stringifyValue($user[$key]);
        }

        return $details;
    }

    private function buildDetailsList(array $details): string
    {
        if ($details === []) {
            return '<p>No additional information provided.</p>';
        }

        $items = '';

        foreach ($details as $label => $value) {
            $items .= '<li style="margin-bottom:8px;"><strong>'.$this->escapeHtml($label).':</strong> '.$this->escapeHtml($value).'</li>';
        }

        return '<ul style="padding-left:20px; margin:0;">'.$items.'</ul>';
    }

    private function formatLabel(string $key): string
    {
        return ucwords(str_replace(['_', '-'], ' ', $key));
    }

    private function stringifyValue(mixed $value): string
    {
        if (is_array($value)) {
            $parts = array_map(fn (mixed $item): string => $this->stringifyValue($item), $value);

            return implode(', ', array_filter($parts, static fn (string $item): bool => $item !== ''));
        }

        if (is_bool($value)) {
            return $value ? 'Yes' : 'No';
        }

        if ($value === null) {
            return '';
        }

        return trim((string) $value);
    }

    private function escapeHtml(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
