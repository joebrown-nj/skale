<?php
declare(strict_types=1);

namespace App\Core\Services;

use App\Core\Contracts\EmailServiceInterface;

class FormSubmissionService
{
    private EmailServiceInterface $emailService;

    public function __construct(EmailServiceInterface $emailService)
    {
        $this->emailService = $emailService;
    }

    public function handleContactSubmission(array $input, ?array $user, ?array $server = null): void
    {
        $server ??= $_SERVER;
        $successMessage = $this->buildContactSuccessMessage();

        $emailMessage = $this->emailService->emailTemplate(
            '<p>Hi '.$input['name'].',</p>'.$successMessage,
            $input['email']
        );
        $this->emailService->sendEmail(
            $input['email'],
            'Thanks for filling out the contact form',
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
            $this->buildAdminEmailBody($input, $user, $server),
            $input['email']
        );
        $this->emailService->sendEmail(
            $_ENV['CONTACT_FORM_MY_EMAIL'],
            'Someone filled out the contact form',
            $adminEmailMessage
        );
    }

    public function handleGetStartedSubmission(array $input, ?array $user, ?array $server = null): void
    {
        $server ??= $_SERVER;
        $successMessage = $this->buildGetStartedSuccessMessage();

        $emailMessage = $this->emailService->emailTemplate(
            '<p>Hi '.$input['name'].',</p>'.$successMessage,
            $input['email']
        );
        $this->emailService->sendEmail(
            $input['email'],
            'Thanks for filling out the contact form',
            $emailMessage,
            $input['name']
        );

        $adminEmailMessage = $this->emailService->emailTemplate(
            $this->buildAdminEmailBody($input, $user, $server),
            $input['email']
        );
        $this->emailService->sendEmail(
            $_ENV['CONTACT_FORM_MY_EMAIL'],
            'Someone filled out the contact form',
            $adminEmailMessage
        );
    }

    private function buildContactSuccessMessage(): string
    {
        $message = '<p>Thanks for being awesome!</p>';
        $message .= '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members.</p>';
        $message .= '<p>Otherwise, we will reply by email as soon as possible.</p>';
        $message .= '<p>Talk to you soon, '.$_ENV['SITE_NAME'].'</p>';

        return $message;
    }

    private function buildGetStartedSuccessMessage(): string
    {
        return '<p class="mb-0">Thanks we will be in touch soon, '.$_ENV['SITE_NAME'].'</p>';
    }

    private function buildAdminEmailBody(array $input, ?array $user, array $server): string
    {
        $message = 'Form data: <br>';
        $message .= json_encode($input);
        $message .= '<br><br>Server data: <br>';
        $message .= json_encode($server);
        $message .= '<br><br>User data: <br>';
        $message .= json_encode($user);

        return $message;
    }
}
