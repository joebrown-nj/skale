<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Models\GetStartedModel;

class GetStartedController
{
    private EmailServiceInterface $emailModel;
    private GetStartedModel $getStartedModel;
    private ViewInterface $view;

    public function __construct(EmailServiceInterface $emailModel, GetStartedModel $getStartedModel, ViewInterface $view) {
        $this->emailModel = $emailModel;
        $this->getStartedModel = $getStartedModel;
        $this->view = $view;
    }

    public function postGetStarted(?array $input = null): string
    {
        $input ??= $_POST;
        $user = $this->view->getUser();
        $validationErrors = $this->getStartedModel->checkForm($input);

        if (!empty($validationErrors)) {
            return JsonResponse::error($validationErrors);
        } else {
            if (!$this->getStartedModel->processGetStartedForm($input)) {
                return JsonResponse::error('There was a problem submitting the form. Please try again.');
            }

            $successMessage = $this->buildSuccessMessage();
            $emailMessage = $this->emailModel->emailTemplate(
                '<p>Hi '.$input['name'].',</p>'.$successMessage,
                $input['email']
            );
            $this->emailModel->sendEmail(
                $input['email'],
                'Thanks for filling out the contact form',
                $emailMessage,
                $input['name']
            );

            $adminEmailMessage = $this->emailModel->emailTemplate(
                $this->buildAdminEmailBody($input, $user),
                $input['email']
            );
            $this->emailModel->sendEmail(
                $_ENV['CONTACT_FORM_MY_EMAIL'],
                'Someone filled out the contact form',
                $adminEmailMessage
            );

            return JsonResponse::success('Thanks, we will be in touch soon.');
        }
    }

    private function buildSuccessMessage(): string
    {
        return '<p class="mb-0">Thanks we will be in touch soon, '.$_ENV['SITE_NAME'].'</p>';
    }

    private function buildAdminEmailBody(array $input, ?array $user): string
    {
        $message = 'Form data: <br>';
        $message .= json_encode($input);
        $message .= '<br><br>Server data: <br>';
        $message .= json_encode($_SERVER);
        $message .= '<br><br>User data: <br>';
        $message .= json_encode($user);

        return $message;
    }
}
