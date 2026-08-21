<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ContactFormInterface;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Models\PageContentModel;

class ContactController
{
    private ContactFormInterface $contactModel;
    private FormSubmissionService $formSubmissionService;
    private RequestBlocklistService $requestBlocklistService;
    private ViewInterface $view;

    public function __construct(ContactFormInterface $contactModel, FormSubmissionService $formSubmissionService, RequestBlocklistService $requestBlocklistService, ViewInterface $view)
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
            return (string) JsonResponse::error('Unable to process request.', 403);
        }

        $input = $this->normalizeInput($input);

        if (FormSubmissionService::containsMaliciousInput($input)) {
            http_response_code(403);
            return (string) JsonResponse::error('Unable to process request.', 403);
        }
        $user = $this->view->getUser();
        $validationErrors = $this->contactModel->validate($input);

        if (!empty($validationErrors)) {
            return (string) JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->save($input)) {
            return (string) JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->deferContactSubmission($input, $user, $_SERVER);

        return (string) JsonResponse::success([
            'redirect' => '/thank-you',
        ]);
    }

    private function normalizeInput(array $input): array
    {
        $input['form_type'] = trim((string) ($input['form_type'] ?? 'contact'));
        $input['name'] = trim((string) ($input['name'] ?? ''));
        $input['email'] = trim((string) ($input['email'] ?? ''));

        if ($input['form_type'] === 'newsletter' && $input['name'] === '') {
            $input['name'] = 'Newsletter Subscriber';
            $input['subscribe'] = 1;
        }

        if (isset($input['interest']) && !isset($input['interests'])) {
            $input['interests'] = [$input['interest']];
        }

        return $input;
    }
}
