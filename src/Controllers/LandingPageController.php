<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Content\LandingPageContentProvider;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Http\Form\LeadFormRequest;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Core\Services\TurnstileService;
use App\Models\ContactModel;

final class LandingPageController
{
    public function __construct(
        private ViewInterface $view,
        private ContactModel $contactModel,
        private FormSubmissionService $formSubmissionService,
        private RequestBlocklistService $requestBlocklistService,
        private TurnstileService $turnstileService,
        private LandingPageContentProvider $content,
    ) {}

    public function automation(): void
    {
        $this->render('automation', $this->content->automation());
    }

    public function marketing(): void
    {
        $this->render('marketing', $this->content->marketing());
    }

    public function websiteDevelopment(): void
    {
        $template = random_int(0, 1) === 0
            ? 'website-development'
            : 'website-development-b';

        $this->render($template, $this->content->websiteDevelopment());
    }

    public function websiteRescue(): void
    {
        $this->render('website-rescue', $this->content->websiteRescue());
    }

    public function taskManagement(): void
    {
        $this->render('task-management', $this->content->taskManagement());
    }

    public function postLeadForm(LeadFormRequest $request): JsonResponse
    {
        if (!$this->turnstileService->validate($request->turnstileToken(), $request->clientIp())) {
            return JsonResponse::error('Verification failed. Please try again.', 403);
        }

        $input = $request->validated();
        $details = ['Landing Page Lead Form Submission'];

        foreach (['team_size' => 'Team Size', 'website' => 'Website', 'website_goal' => 'Website Goal', 'package' => 'Package', 'lead_source' => 'Lead Source'] as $field => $label) {
            if ($input[$field] !== '') {
                $details[] = $label . ': ' . $input[$field];
            }
        }

        if ($input['comment'] !== '') {
            $details[] = $input['comment'];
        }

        $input['comment'] = implode(' - ', $details);

        if ($this->requestBlocklistService->findMatchingSubmissionRule($input, $request->server()) !== null) {
            return JsonResponse::error('Unable to process request.', 403);
        }

        if (FormSubmissionService::containsMaliciousInput($input)) {
            return JsonResponse::error('Unable to process request.', 403);
        }

        $validationErrors = array_values(array_unique(array_merge(
            $request->errors(),
            $this->contactModel->checkLeadForm($input),
        )));

        if ($validationErrors !== []) {
            return JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->processLeadForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->deferContactSubmission($input, $this->view->getUser(), $request->server());

        return JsonResponse::success(['redirect' => '/thank-you']);
    }

    private function render(string $template, array $sections): void
    {
        $data = ['template' => 'inc/landing-pages/' . $template . '.tpl'];

        if ($sections !== []) {
            $data['sections'] = $sections;
        }

        $this->view->render('landing', $data);
    }
}
