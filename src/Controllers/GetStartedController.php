<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;
use App\Models\GetStartedModel;
use App\Core\Traits\RedirectTrait;

class GetStartedController
{
    private FormSubmissionService $formSubmissionService;
    private GetStartedModel $getStartedModel;
    private ViewInterface $view;
    use RedirectTrait;

    public function __construct(FormSubmissionService $formSubmissionService, GetStartedModel $getStartedModel, ViewInterface $view) {
        $this->formSubmissionService = $formSubmissionService;
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
        }

        if (!$this->getStartedModel->processGetStartedForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->handleGetStartedSubmission($input, $user, $_SERVER);

        // return JsonResponse::success('Thanks, we will be in touch soon.');
        return $this->redirect('/thank-you');
    }
}
