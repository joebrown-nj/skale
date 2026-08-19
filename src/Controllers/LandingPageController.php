<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Content\LandingPageContentProvider;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Http\Form\LeadFormRequest;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;
use App\Models\ContactModel;

final class LandingPageController
{


    public function postLeadForm(LeadFormRequest $request): JsonResponse
    {
        $input = $request->validated();
        $input['comment'] = 'Landing Page Lead Form Submission -  Team Size: '
            . ($input['team_size'] ?? '') . ' - ' . ($input['comment'] ?? '');

        if ($this->requestBlocklistService->findMatchingSubmissionRule($input, $request->server()) !== null) {
            return JsonResponse::error('Unable to process request.', 403);
        }

        if ($this->formSubmissionService->containsMaliciousInput($input)) {
            return JsonResponse::error('Unable to process request.', 403);
        }

        $validationErrors = array_merge($request->errors(), $this->contactModel->checkLeadForm($input));

        if ($validationErrors !== []) {
            return JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->processLeadForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->handleContactSubmission($input, $this->view->getUser(), $request->server());

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
