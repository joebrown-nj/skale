<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;
use App\Core\Services\FormSubmissionService;

class SubPageController
{
    private ViewInterface $view;

    public function __construct(ViewInterface $view, private readonly FormSubmissionService $formSubmissionService)
    {
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render('subpage');
    }

    public function thankYou()
    {
        $this->view->render('thank-you');
        $this->formSubmissionService->sendDeferredSubmissions();
    }
}
