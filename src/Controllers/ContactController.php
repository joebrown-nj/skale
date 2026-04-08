<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\LoadSessionData;
use App\Models\ContactModel;
use App\Models\PageContentModel;

class ContactController
{
    private EmailServiceInterface $emailModel;
    private PageContentModel $pageContentModel;
    private ContactModel $contactModel;
    private ViewInterface $view;
    private LoadSessionData $loadSessionData;

    public function __construct(PageContentModel $pageContentModel, LoadSessionData $loadSessionData, ContactModel $contactModel, EmailServiceInterface $emailModel, ViewInterface $view)
    {
        $this->emailModel = $emailModel;
        $this->pageContentModel = $pageContentModel;
        $this->contactModel = $contactModel;
        $this->view = $view;
        $this->loadSessionData = $loadSessionData;
    }

    public function index(): void
    {
        $this->view->render('contact', array(
            'pageContent' => $this->pageContentModel->getPageContentByUrl($this->view->getUri())
        ));
    }

    public function submit(?array $input = null): string
    {
        $input ??= $_POST;
        $user = $this->view->getUser();
        $validationErrors = $this->contactModel->checkContactForm($input);

        if (!empty($validationErrors)) {
            return JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->processContactForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        } else {
            $successMessage = $this->buildContactSuccessMessage();
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

            if (($input['subscribe'] ?? null) == 1) {
                $this->emailModel->emailListSignup(
                    ['email' => $input['email'], 'userInfo' => json_encode($user)],
                    $user
                );
            }

            $adminEmailMessage = $this->emailModel->emailTemplate(
                $this->buildAdminEmailBody($input, $user),
                $input['email']
            );
            $this->emailModel->sendEmail(
                $_ENV['CONTACT_FORM_MY_EMAIL'],
                'Someone filled out the contact form',
                $adminEmailMessage
            );

            return JsonResponse::success('Thanks for contacting us. We will reply by email as soon as possible.');
        }
    }

    private function buildContactSuccessMessage(): string
    {
        $message = '<p>Thanks for being awesome!</p>';
        $message .= '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members.</p>';
        $message .= '<p>Otherwise, we will reply by email as soon as possible.</p>';
        $message .= '<p>Talk to you soon, '.$_ENV['SITE_NAME'].'</p>';

        return $message;
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
