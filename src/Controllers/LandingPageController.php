<?php

namespace App\Controllers;

use App\Models\HomePageModel;
use App\Models\ContactModel;
use App\Core\Contracts\ViewInterface;
use App\Core\Http\JsonResponse;
use App\Core\Services\FormSubmissionService;
use App\Core\Services\RequestBlocklistService;

class LandingPageController
{
    private ContactModel $contactModel;
    private ViewInterface $view;
    private FormSubmissionService $formSubmissionService;
    private RequestBlocklistService $requestBlocklistService;

    public function __construct(ViewInterface $view, ContactModel $contactModel, FormSubmissionService $formSubmissionService, RequestBlocklistService $requestBlocklistService) {
        $this->view = $view;
        $this->contactModel = $contactModel;
        $this->formSubmissionService = $formSubmissionService;
        $this->requestBlocklistService = $requestBlocklistService;
    }

    public function automation()
    {
        $this->view->render('landing', 
            array(
                'template' => 'inc/landing-pages/automation.tpl',
            )
        );
    }

    public function marketing()
    {
        $this->view->render('landing', 
            array(
                'template' => 'inc/landing-pages/marketing.tpl',
            )
        );
    }

    public function websiteDevelopment()
    {
        $this->view->render('landing', 
            array(
                'template' => 'inc/landing-pages/website-development.tpl',
                'sections' => array(
                    [
                        'sectionHero' => array(
                            'category' => 'Website Development',
                            'headline' => 'Websites Built To Generate Leads, Not Just Look Good',
                            'subheadline' => 'Your website should be your best salesperson. We design and develop high-performing websites focused on speed, user experience, search visibility, and converting visitors into customers.',
                            'text' => 'Whether you\'re starting from scratch or rebuilding an outdated site, we create websites that help businesses attract more traffic, build trust faster, and turn clicks into real opportunities.',
                            'checks' => array(
                                'Custom Websites',
                                'CRM & Lead Routing',
                                'Custom Internal Tools',
                                'Reporting Automation',
                                'App & System Integrations',
                                'Built to Scale'
                            ),
                            'ctaText' => 'Get My Website Plan',
                            // 'imageSrc' => '/assets/images/landing/website-dev/website-hero.png',
                            // 'imageAlt' => 'Website Development Services'
                            'formHeadline' => 'Get Your Free Growth Strategy Session',
                            'formText' => 'We\'ll review your current setup and identify opportunities to generate more leads and improve efficiency.',
                            'formButtonText' => 'Get My Free Strategy Session',
                            'formUserMessageLabel' => 'What do you want to improve with your website?'
                        ),
                        'sectionComparison' => array(
                            'category' => 'Why Choose Skale',
                            'headline' => 'Why Choose Skale',
                            'subheadline' => 'Most Agencies Build Websites.<br>We Build Growth Infrastructure.',
                            'text' => 'Not all website development partners are created equal. Here\'s how Skale compares to a typical web design agency.',
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
                            )
                        ),
                        'sectionWhySkale' => array(
                            'headline' => 'Why Businesses Work With Skale',
                            'subheadline' => 'Many businesses invest in attractive websites but struggle to generate results. We focus on building systems that support growth rather than creating something that simply looks good.',
                            'text' => 'Our approach combines strategy, design, performance, and conversion optimization so your website actively contributes to revenue generation.',
                            'features' => array(
                                array(
                                    'title' => 'Convert More Visitors',
                                    'description' => 'Clear messaging, optimized calls-to-action, and strategic layouts help guide users toward taking action.'
                                ),
                                array(
                                    'title' => 'Built For Growth',
                                    'description' => 'Create a foundation that can evolve with your business as traffic, products, and services expand.'
                                ),
                                array(
                                    'title' => 'Faster Performance',
                                    'description' => 'Reduce page load times and improve user experience across desktop and mobile devices.'
                                )
                            )
                        ),
                        'sectionBuiltForGrowth' => array(
                            'headline' => 'Built for More Than Just Launch Day',
                            'subheadline' => 'Your website should be your hardest-working business asset. At Skale, we combine website development, automation, analytics, and growth strategy to create systems that help businesses generate more leads, operate more efficiently, and scale with confidence.',
                            'ctaButtonText' => 'Get Your Free Growth Strategy Session',
                        ),
                        'sectionProcess' => array(
                            'headline' => 'How It Works',
                            'subheadline' => 'We take a strategic approach to website development, starting with understanding your business and growth goals, then building a custom solution that supports those goals and drives results.',
                            'steps' => array(
                                array(
                                    'title' => 'Discover',
                                    'description' => 'We learn about your goals, audience, and current challenges.'
                                ),
                                array(
                                    'title' => 'Build',
                                    'description' => 'We design and develop a custom experience aligned with your business objectives.'
                                ),
                                array(
                                    'title' => 'Launch & Optimize',
                                    'description' => 'Track performance and continue improving results over time.'
                                )
                            )
                        )
                    ]
                )
            )
        );
    }

    public function postLeadForm()
    {
        $input ??= $_POST;
        $input['comment'] = 'Landing Page Lead Form Submission - '. $input['comment'];

        if ($this->requestBlocklistService->findMatchingSubmissionRule($input, $_SERVER) !== null) {
            http_response_code(403);
            return JsonResponse::error('Unable to process request.');
        }

        $user = $this->view->getUser();
        $validationErrors = $this->contactModel->checkLeadForm($input);

        if (!empty($validationErrors)) {
            return JsonResponse::error($validationErrors);
        }

        if (!$this->contactModel->processLeadForm($input)) {
            return JsonResponse::error('There was a problem submitting the form. Please try again.');
        }

        $this->formSubmissionService->handleContactSubmission($input, $user, $_SERVER);

        return JsonResponse::success([
            'redirect' => '/thank-you',
        ]);
    }
}
