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
        $this->view->render('landing', $this->websiteDevelopment());
    }

    public function websiteDevelopment()
    {
        return array(
            'template' => 'inc/landing-pages/website-development.tpl',
            'comparisonCards' => array(
                array(
                    'title' => 'Primary Focus',
                    'typical' => 'Design & aesthetics',
                    'skale' => 'Business growth & lead generation'
                ),
                array(
                    'title' => 'Website Strategy',
                    'typical' => 'Build a website and launch',
                    'skale' => 'Create a website that supports marketing, sales, and growth goals'
                ),
                array(
                    'title' => 'Development Approach',
                    'typical' => 'Templates and page builders',
                    'skale' => 'Custom development and scalable solutions'
                ),
                array(
                    'title' => 'SEO Optimization',
                    'typical' => 'Basic setup',
                    'skale' => 'Built-in SEO best practices and performance optimization'
                ),
                array(
                    'title' => 'Marketing Integration',
                    'typical' => 'Limited or outsourced',
                    'skale' => 'Integrated with CRM, email marketing, analytics, and automation'
                ),
                array(
                    'title' => 'Analytics & Tracking',
                    'typical' => 'Google Analytics only',
                    'skale' => 'Lead tracking, conversion tracking, and reporting'
                ),
                array(
                    'title' => 'Technical Expertise',
                    'typical' => 'Design-focused team',
                    'skale' => '20+ years of engineering and software development experience'
                ),
                array(
                    'title' => 'After Launch Support',
                    'typical' => 'Maintenance only',
                    'skale' => 'Ongoing optimization and growth strategy'
                ),
                array(
                    'title' => 'Long-Term Value',
                    'typical' => 'Website project completed',
                    'skale' => 'Continuous improvement and business growth partnership'
                )
            ),
            'something' => array(
                array(
                    'title' => '',
                    'typical' => 'Typical Agency',
                    'skale' => 'Skale'
                ),
            )
        );
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
