<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Content\LandingPageContentProvider;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Models\ContactModel;

final class LandingPageController
{
    public function __construct(
        private ViewInterface $view,
        private ContactModel $contactModel,
        private FormSubmissionService $formSubmissionService,
        private RequestBlocklistService $requestBlocklistService,
        private LandingPageContentProvider $content,
    ) {
    }

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
        $this->render('website-development', $this->content->websiteDevelopment());
    }

    public function taskManagement(): void
    {
        $this->render('task-management', $this->content->taskManagement());
    }

    public function postLeadForm(array $input): string
    {
        $input['comment'] = 'Landing Page Lead Form Submission -  Team Size: '
            . ($input['team_size'] ?? '') . ' - ' . ($input['comment'] ?? '');

        if ($this->requestBlocklistService->findMatchingSubmissionRule($input, $_SERVER) !== null) {
            http_response_code(403);
            return JsonResponse::error('Unable to process request.');
        }

        $validationErrors = $this->contactModel->checkLeadForm($input);

        if ($validationErrors !== []) {
            return JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->processLeadForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->handleContactSubmission($input, $this->view->getUser(), $_SERVER);

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
