<?php

namespace App\Controllers;

use App\Models\HomePageModel;
use App\Models\ContactModel;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;

class LandingPageController
{
    private ContactModel $contactModel;
    private ViewInterface $view;
    private FormSubmissionService $formSubmissionService;

    public function __construct(ViewInterface $view, ContactModel $contactModel, FormSubmissionService $formSubmissionService) {
        $this->view = $view;
        $this->contactModel = $contactModel;
        $this->formSubmissionService = $formSubmissionService;
    }

    public function index()
    {
        $this->view->render('landing');
    }

    public function postLeadForm()
    {
        $input ??= $_POST;
        $input['comment'] = 'Landing Page Lead Form Submission - '. $input['comment'];
        $user = $this->view->getUser();
        $validationErrors = $this->contactModel->checkContactForm($input);

        if (!empty($validationErrors)) {
            return JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->processContactForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->handleContactSubmission($input, $user, $_SERVER);

        return JsonResponse::success('Thanks for contacting us. We will reply by email as soon as possible.');
    }
}
