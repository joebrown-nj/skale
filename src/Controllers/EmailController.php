<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\EmailTemplateRendererInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\RequestBlocklistService;

class EmailController
{
    private EmailServiceInterface $emailModel;
    private RequestBlocklistService $requestBlocklistService;
    private ViewInterface $view;

    public function __construct(EmailServiceInterface $emailModel, RequestBlocklistService $requestBlocklistService, ViewInterface $view, private readonly EmailTemplateRendererInterface $emailRenderer)
    {
        $this->emailModel = $emailModel;
        $this->requestBlocklistService = $requestBlocklistService;
        $this->view = $view;
    }

    public function emailTemplate(): null
    {
        $message = $this->emailRenderer->render('', 'joe@joe.com');
        echo $message;
        // $this->emailModel->sendEmail('joebro84@yahoo.com', 'Test Email', $message, 'Joe');
        return null;
    }

    public function signUp(?array $input = null): string
    {
        $input ??= $_POST;
        $email = $input['email'] ?? '';

        if ($this->requestBlocklistService->findMatchingSubmissionRule($input, $_SERVER) !== null) {
            http_response_code(403);
            return (string) JsonResponse::error('Unable to process request.', 403);
        }

        if (!$this->emailModel->validateEmail($email)) {
            return (string) JsonResponse::error(['A valid email is required']);
        }

        if ($this->emailModel->checkIfEmailIsOnList($email)) {
            return (string) JsonResponse::error('You are already on the list');
        }

        if ($this->emailModel->emailListSignup($input, $this->view->getUser())) {
            return (string) JsonResponse::success('Thanks for joining the mailing list!');
        }

        return (string) JsonResponse::error('Unable to process email signup');
    }
}
