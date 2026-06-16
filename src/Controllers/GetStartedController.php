<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Models\GetStartedModel;
use App\Models\ContactModel;

class GetStartedController
{
    private FormSubmissionService $formSubmissionService;
    private RequestBlocklistService $requestBlocklistService;
    private GetStartedModel $getStartedModel;
    private ContactModel $contactModel;
    private ViewInterface $view;

    public function __construct(FormSubmissionService $formSubmissionService, RequestBlocklistService $requestBlocklistService, GetStartedModel $getStartedModel, ContactModel $contactModel, ViewInterface $view) {
        $this->formSubmissionService = $formSubmissionService;
        $this->requestBlocklistService = $requestBlocklistService;
        $this->getStartedModel = $getStartedModel;
        $this->contactModel = $contactModel;
        $this->view = $view;
    }

    public function postGetStarted(?array $input = null): string
    {
        $input ??= $_POST;
        $input['comment'] = 'Get Started Form Submission - '. $input['comment'];

        if ($this->requestBlocklistService->findMatchingSubmissionRule($input, $_SERVER) !== null) {
            http_response_code(403);
            return JsonResponse::error('Unable to process request.');
        }

        $user = $this->view->getUser();
        $validationErrors = $this->getStartedModel->checkForm($input);

        if (!empty($validationErrors)) {
            return JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->processContactForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->handleGetStartedSubmission($input, $user, $_SERVER);

        return JsonResponse::success([
            'redirect' => '/thank-you',
        ]);
    }
}
