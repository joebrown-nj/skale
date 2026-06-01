<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;
use App\Models\ContactModel;
use App\Models\PageContentModel;

class ContactController
{
 private ContactModel $contactModel;
 private FormSubmissionService $formSubmissionService;
 private ViewInterface $view;

 public function __construct(ContactModel $contactModel, FormSubmissionService $formSubmissionService, ViewInterface $view)
 {
 $this->contactModel = $contactModel;
 $this->formSubmissionService = $formSubmissionService;
 $this->view = $view;
 }

 public function index(): void
 {
 $this->view->render('contact');
 }

 public function submit(?array $input = null): string
 {
 $input ??= $_POST;
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
