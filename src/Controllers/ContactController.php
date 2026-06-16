<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Models\ContactModel;
use App\Models\PageContentModel;

class ContactController
{
    private ContactModel $contactModel;
    private FormSubmissionService $formSubmissionService;
    private RequestBlocklistService $requestBlocklistService;
    private ViewInterface $view;

    public function __construct(ContactModel $contactModel, FormSubmissionService $formSubmissionService, RequestBlocklistService $requestBlocklistService, ViewInterface $view)
    {
        $this->contactModel = $contactModel;
        $this->formSubmissionService = $formSubmissionService;
        $this->requestBlocklistService = $requestBlocklistService;
        $this->view = $view;
    }

    public function index(): void
    {
        $this->view->render('contact');
    }

    public function submit(?array $input = null): string
    {
        $input ??= $_POST;

        if ($this->requestBlocklistService->findMatchingSubmissionRule($input, $_SERVER) !== null) {
            http_response_code(403);
            return JsonResponse::error('Unable to process request.');
        }

        $user = $this->view->getUser();
        $validationErrors = $this->contactModel->checkContactForm($input);

        if (!empty($validationErrors)) {
            return JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->processContactForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->handleContactSubmission($input, $user, $_SERVER);

        return JsonResponse::success([
            'redirect' => '/thank-you',
        ]);
    }
}
