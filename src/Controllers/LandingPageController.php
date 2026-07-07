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
                'sections' => $this->getAutomationSections()
            )
        );
    }

    private function getAutomationSections(): array
    {
        $sections = array(
            'sectionFAQ' => $this->getAutomationFAQ()
        );

        return $sections;
    }

    private function getAutomationFAQ(): array
    {
        return array(
            [
                'question' => 'What types of automation can you build?',
                'answer' => 'We can help with CRM automation, lead routing, reporting workflows, email automation, internal tools, integrations, data cleanup, and custom software workflows.'
            ],
            [
                'question' => 'Do I need custom software?',
                'answer' => 'Not always. Sometimes the best solution is connecting the tools you already use. Other times, custom software is the right fit when your process is unique or limited by off-the-shelf platforms.'
            ],
            [
                'question' => 'Can you connect my website to my CRM?',
                'answer' => 'Yes. We can connect forms, landing pages, lead sources, email platforms, CRMs, analytics tools, and reporting dashboards.'
            ],
            [
                'question' => 'How long does automation work take?',
                'answer' => 'Timelines depend on complexity. Small workflow improvements may be completed quickly, while larger integrations or custom tools require more planning and development.'
            ],
            [
                'question' => 'Can you improve an existing process?',
                'answer' => 'Yes. We can review your current systems, identify bottlenecks, and improve or rebuild workflows to make them more efficient and scalable.'
            ]
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
                'sections' => $this->getWebsiteDevelopmentSections()
            )
        );
    }

    private function getWebsiteDevelopmentSections(): array
    {
        $sections[] = array(
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
                'formHeadline' => 'Get Your Free Growth Strategy Session',
                'formText' => 'We\'ll review your current setup and identify opportunities to generate more leads and improve efficiency.',
                'formButtonText' => 'Get My Free Strategy Session',
                'formUserMessageLabel' => 'What do you want to improve with your website?'
            ),
            'sectionComparison' => $this->getWebsiteDevelopmentComparison(),
            'sectionWhySkale' => $this->getWebsiteDevelopmentWhySkale(),
            'sectionBuiltForGrowth' => $this->getWebsiteDevelopmentBuiltForGrowth(),
            'sectionProcess' => $this->getWebsiteDevelopmentProcess(),
            'sectionFAQ' => $this->getWebsiteFAQ(),
            'sectionStats' => $this->getWebsiteDevelopmentStats()
        );

        $sections[] = array(
            'sectionHero' => array(
                'category' => 'Website Development',
                'headline' => 'Stop Losing Customers To Competitors Online',
                'subheadline' => 'Get a website designed to attract, convert, and follow up with potential customers automatically.',
                'text' => 'Whether you\'re starting from scratch or rebuilding an outdated site, we create websites that help businesses attract more traffic, build trust faster, and turn clicks into real opportunities.',
                'checks' => array(
                    'Mobile Optimized',
                    'SEO Ready',
                    'Lead Tracking Included',
                    'Free Website Growth Review'
                ),
                'ctaText' => 'Get My Website Plan',
                'formHeadline' => 'Get Your Free Growth Strategy Session',
                'formText' => 'We\'ll review your current setup and identify opportunities to generate more leads and improve efficiency.',
                'formButtonText' => 'Get My Free Strategy Session',
                'formUserMessageLabel' => 'What do you want to improve with your website?'
            ),
            'sectionComparison' => $this->getWebsiteDevelopmentComparison(),
            'sectionWhySkale' => $this->getWebsiteDevelopmentWhySkale(),
            'sectionBuiltForGrowth' => $this->getWebsiteDevelopmentBuiltForGrowth(),
            'sectionProcess' => $this->getWebsiteDevelopmentProcess(),
            'sectionFAQ' => $this->getWebsiteFAQ(),
            'sectionStats' => $this->getWebsiteDevelopmentStats()
        );

        return $sections[array_rand($sections)];
    }

    private function getWebsiteDevelopmentStats(): array
    {
        return array(
            [
                'number' =>100,
                'suffix' => '%',
                'label' => 'Custom Solutions'
            ],
            [
                'number' =>20,
                'suffix' => '+',
                'label' => 'Years of Experience'
            ],
            [
                'number' =>24,
                'suffix' => '/7',
                'label' => 'Support & Optimization'
            ],
            [
                'number' =>1,
                'suffix' => '',
                'label' => 'Growth Partner'
            ]
        );
    }

    private function getWebsiteFAQ(): array
    {
        return array(
            [
                'question' => 'How much does a website cost?',
                'answer' => 'Every project is different depending on functionality and scope.'
            ],
            [
                'question' => 'How long does development take?',
                'answer' => 'Most projects range from 2-6 weeks.'
            ],
            [
                'question' => 'Can you redesign an existing website?',
                'answer' => 'Yes.'
            ],
            [
                'question' => 'Will my website work on mobile devices?',
                'answer' => 'Yes, every website is built for mobile and desktop users.'
            ],
            [
                'question' => 'Can you help with SEO and marketing?',
                'answer' => 'Yes, websites can be paired with SEO and marketing services.'
            ],
            [
                'question' => 'What industries do you specialize in?',
                'answer' => 'We have experience across a wide range of industries, including technology, healthcare, finance, e-commerce, and more. Our team is adaptable and can tailor our solutions to meet the unique needs of your industry.'
            ],
            [
                'question' => 'How do you approach project management?',
                'answer' => 'We use agile methodologies to ensure flexibility and transparency throughout the project lifecycle. This allows us to adapt to changing requirements and deliver high-quality results on time.'
            ],
            [
                'question' => 'What is your pricing model?',
                'answer' => 'Our pricing model is flexible and based on the specific needs of each project. We offer both fixed-price and time-and-materials options, depending on the scope and complexity of the work.'
            ],
            [
                'question' => 'How do you ensure the security of my data?',
                'answer' => 'We take data security very seriously. We implement industry best practices for data protection, including encryption, secure access controls, and regular security audits to safeguard your information.'
            ],
            [
                'question' => 'How long does development take?',
                'answer' => 'Most projects range from 2-6 weeks.'
            ],
            [
                'question' => 'Can you redesign an existing site?',
                'answer' => 'Yes, we can redesign existing websites to improve functionality, user experience, and visual appeal.'
            ],
            [
                'question' => 'Do you provide maintenance?',
                'answer' => 'Yes, we offer ongoing maintenance packages to ensure your website remains up-to-date, secure, and functioning optimally.'
            ],
            [
                'question' => 'Will I be able to edit the website myself?',
                'answer' => 'Yes, we provide training and documentation to help you manage and update your website content independently.'
            ]
        );
    }

    private function getWebsiteDevelopmentWhySkale(): array
    {
        return array(
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
        );
    }

    private function getWebsiteDevelopmentBuiltForGrowth(): array
    {
        return array(
                'headline' => 'Built for More Than Just Launch Day',
                'subheadline' => 'Your website should be your hardest-working business asset. At Skale, we combine website development, automation, analytics, and growth strategy to create systems that help businesses generate more leads, operate more efficiently, and scale with confidence.',
                'ctaButtonText' => 'Get Your Free Growth Strategy Session',
            );
    }

    private function getWebsiteDevelopmentProcess(): array
    {
        return array(
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
        );
    }

    public function getWebsiteDevelopmentComparison(): array
    {
        return array(
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

    public function taskManagement()
    {
        $this->view->render('landing', 
            array(
                'template' => 'inc/landing-pages/task-management.tpl',
                'sections' => $this->getTaskManagementSections()
            )
        );
    }

    private function getTaskManagementSections(): array
    {
        $sections = array(
            'sectionFAQ' => $this->getTaskManagementFAQ(),
            'sectionStats' => $this->getTaskManagementStats(),
            'sectionComparison' => $this->getTaskManagementComparison()
        );

        return $sections;
    }

    private function getTaskManagementStats(): array
    {
        return array(
            [
                'number' => '1',
                'suffix' => '',
                'label' => 'Central Place For Work'
            ],
            [
                'number' => '100',
                'suffix' => '%',
                'label' => 'Clearer Task Ownership'
            ],
            [
                'number' => '24',
                'suffix' => '/7',
                'label' => 'Project Visibility'
            ],
            [
                'number' => 'Better',
                'suffix' => '',
                'label' => 'Workflow Insights'
            ]
        );
    }

    private function getTaskManagementFAQ(): array
    {
        // return array(
        //     [
        //         'question' => 'What types of task management solutions can you build?',
        //         'answer' => 'We can help with project management tools, workflow automation, team collaboration platforms, and custom task tracking systems.'
        //     ],
        //     [
        //         'question' => 'Do I need custom software for task management?',
        //         'answer' => 'Not always. Sometimes the best solution is using existing tools and integrating them. Other times, custom software is the right fit when your process is unique or limited by off-the-shelf platforms.'
        //     ],
        //     [
        //         'question' => 'Can you integrate task management with other systems?',
        //         'answer' => 'Yes. We can connect task management tools with CRMs, email platforms, reporting dashboards, and other business systems.'
        //     ],
        //     [
        //         'question' => 'How long does task management work take?',
        //         'answer' => 'Timelines depend on complexity. Small workflow improvements may be completed quickly, while larger integrations or custom tools require more planning and development.'
        //     ],
        //     [
        //         'question' => 'Can you improve an existing task management process?',
        //         'answer' => 'Yes. We can review your current systems, identify bottlenecks, and improve or rebuild workflows to make them more efficient and scalable.'
        //     ]
        // );

        return array(
            [
                'question' => 'Do I need a paid task management system?',
                'answer' => 'Not always. Free tools can work well for small teams with simple workflows. Paid tools are usually better when you need dashboards, advanced reporting, time tracking, permissions, automation, or integrations.'
            ],
            [
                'question' => 'Can you help us move from spreadsheets?',
                'answer' => 'Yes. We can review your current spreadsheets, organize your workflow, migrate important information, and set up a task management system that is easier for your team to use.'
            ],
            [
                'question' => 'Can we track how long tasks take?',
                'answer' => 'Yes. Many systems support time tracking directly or through integrations. This helps you understand average task times, find bottlenecks, improve estimates, and identify work that takes longer than expected.'
            ],
            [
                'question' => 'Can tasks be assigned to different users?',
                'answer' => 'Yes. Assigning tasks to users is one of the biggest advantages over spreadsheets. Each task can have an owner, due date, priority, status, notes, files, and activity history.'
            ],
            [
                'question' => 'Can this connect with our other business tools?',
                'answer' => 'Yes. Depending on the platform, task systems can connect with email, calendars, CRM platforms, forms, Slack, Google Workspace, Microsoft 365, reporting dashboards, and custom software.'
            ]
        );
    }

    public function getTaskManagementComparison(): array
    {
        return array(
            'category' => 'Spreadsheet vs Task System',
            'headline' => 'A Better Way To Manage Work',
            'subheadline' => '',
            'text' => '',
            'comparisonCards' => array(
                array(
                    'title' => 'Task Ownership',
                    'typical' => 'Manual notes and inconsistent updates',
                    'skale' => 'Tasks assigned directly to users'
                ),
                array(
                    'title' => 'Project Progress',
                    'typical' => 'Hard to see what is done, late, or blocked',
                    'skale' => 'Clear status views, boards, lists, and dashboards'
                ),
                array(
                    'title' => 'Accountability',
                    'typical' => 'Easy for work to get lost',
                    'skale' => 'Owners, due dates, reminders, and activity history'
                ),
                array(
                    'title' => 'Time Tracking',
                    'typical' => 'Manual and often inaccurate',
                    'skale' => 'Track task duration and average completion times'
                ),
                array(
                    'title' => 'Process Improvement',
                    'typical' => 'Difficult to identify bottlenecks',
                    'skale' => 'Reports reveal slow tasks, overloaded users, and repeat issues'
                ),
                array(
                    'title' => 'Scalability',
                    'typical' => 'Gets messy as the team grows',
                    'skale' => 'Built for repeatable workflows and growing teams'
                )
            )
        );
    }
}
