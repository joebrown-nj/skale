<?php
declare(strict_types=1);

namespace App\Core\Services;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Config\MailConfig;
use App\Core\Config\SiteConfig;

class FormSubmissionService
{
    private EmailServiceInterface $emailService;
    private EmailQueueService $emailQueueService;

    public function __construct(
        EmailServiceInterface $emailService,
        EmailQueueService $emailQueueService,
        private readonly SiteConfig $siteConfig,
        private readonly MailConfig $mailConfig,
    )
    {
        $this->emailService = $emailService;
        $this->emailQueueService = $emailQueueService;
    }

    public function handleContactSubmission(array $input, ?array $user, ?array $server = null): void
    {
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

    private function deliverEmail(string $to, string $subject, string $body, ?string $toName = null): void
    {
        if ($this->emailQueueService->isEnabled() && $this->emailQueueService->enqueueEmail($to, $subject, $body, $toName)) {
            return;
        }

        $this->emailService->sendEmail($to, $subject, $body, $toName);
    }

    private function buildContactSuccessMessage(): string
    {
        // $message = '<p>Thanks for being awesome!</p>';
        // $message .= '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members.</p>';
        // $message .= '<p>Otherwise, we will reply by email as soon as possible.</p>';
        // $message .= '<p>Talk to you soon, '.$this->siteConfig->name.'</p>';

        // return $message;
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
