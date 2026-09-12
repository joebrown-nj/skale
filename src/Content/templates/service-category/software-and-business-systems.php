<?php

$url_services_solutions = '/'. $_ENV['URL_SERVICES_SOLUTIONS'] .'/';

return array(
    'hero' => array(
        'category_eyebrow' => 'Software & Business Systems',
        'title' => 'Build better systems for the way your business actually works.',
        'copy' => 'Skale helps businesses build custom software, replace fragile spreadsheets and manual tools, modernize aging applications, and create systems that support employees, customers, and continued growth.',
        'points' => array(
            'Spreadsheets that no longer scale',
            'Outdated software',
            'Missing internal tools',
            'Processes software can\'t support'
        ),
        'actions' => array(
            array(
                'href' => '#services',
                'label' => 'Explore Software Solutions',
                'class' => 'btn-skale'
            ),
            array(
                'href' => '#contact',
                'label' => 'Tell Me What\'s Not Working',
                'class' => 'btn-skale-outline'
            )
        )
    ),
    'problem' => array(
        'title' => 'Quick Problem Recognition',
        'items' => array(
            array(
                'title' => 'Spreadsheets are running too much of your business',
                'description' => 'Important workflows depend on files that are difficult to manage, share, secure, report from, or scale.'
            ),
            array(
                'title' => 'Existing software doesn\'t fit your process',
                'description' => 'Your team is changing how it works to accommodate software instead of having technology support the way the business actually operates.'
            ),
            array(
                'title' => 'Your application has become difficult to maintain',
                'description' => 'Older technology, accumulated complexity, poor performance, or technical debt makes every new feature harder to deliver.'
            ),
            array(
                'title' => 'Customers or employees need a better system',
                'description' => 'Important information, tasks, requests, or workflows still happen through email, spreadsheets, and disconnected tools.'
            )
        )
    ),
    'category_intro' => array(
        'eyebrow' => 'Find The Right Solution',
        'title' => 'Start with what your current tools can\'t do.',
        'copy' => 'You don\'t need to know whether you need custom software, an internal business tool, a customer portal, modernization, or a broader technology solution. Choose the situation that sounds closest to yours and explore how Skale can help.'
    ),
    'service_cards' => array(
        array(
            'service_number' => '01',
            'title' => 'Custom Software Development',
            'description' => 'Build software around your business requirements when existing products don\'t provide the functionality, flexibility, or integrations you need.',
            'features' => array(
                'Custom web applications',
                'Business workflow software',
                'API & system integration'
            ),
            'link' => $url_services_solutions . 'custom-software-development',
            'link_text' => 'Explore Custom Software'
        ),
        array(
            'service_number' => '02',
            'title' => 'Internal Business Tools',
            'description' => 'Replace spreadsheets, manual tracking, and disconnected processes with purpose-built tools that make everyday work easier to manage.',
            'features' => array(
                'Operational dashboards',
                'Workflow management tools',
                'Data & reporting systems'
            ),
            'link' => $url_services_solutions . 'internal-business-tools',
            'link_text' => 'Explore Business Tools'
        ),
        // array(
        //     'service_number' => '03',
        //     'title' => 'Customer & Partner Portals',
        //     'description' => 'Give customers, vendors, or partners a secure place to access information, submit requests, manage activity, and interact with your business.',
        //     'features' => array(
        //         'Customer portals',
        //         'Partner & vendor portals',
        //         'Secure self-service experiences'
        //     ),
        //     'link' => $url_services_solutions . 'customer-and-partner-portals',
        //     'link_text' => 'Explore Customer & Partner Portals'
        // ),
        // array(
        //     'service_number' => '04',
        //     'title' => 'Software Modernization',
        //     'description' => 'Improve aging or difficult-to-maintain applications so they perform better, are easier to extend, and can support the future needs of your business.',
        //     'features' => array(
        //         'Legacy application improvements',
        //         'Performance optimization',
        //         'Architecture modernization'
        //     ),
        //     'link' => $url_services_solutions . 'software-modernization',
        //     'link_text' => 'Explore Software Modernization'
        // ),
        array(
            'service_number' => '05',
            'title' => 'IT & Technology Solutions',
            'description' => 'Solve broader technology challenges involving infrastructure, software, platforms, integrations, workflows, and the systems supporting your business.',
            'features' => array(
                'Technology assessment',
                'Systems planning',
                'Implementation & optimization'
            ),
            'link' => $url_services_solutions . 'it-and-technology-solutions',
            'link_text' => 'Explore Technology Solutions'
        ),
        array(
            'service_number' => '?',
            'title' => 'Not Sure What You Need?',
            'description' => 'If your current software or processes are holding the business back but you aren\'t sure what should replace them, start with the problem instead.',
            'features' => array(
                'Explain what\'s happening',
                'No technical specification needed',
                'Get a practical recommendation'
            ),
            'link' => '/contact',
            'link_text' => 'Tell Me What\'s Not Working'
        )
    ),
    'help' => array(
        'eyebrow' => 'Still Deciding?',
        'title' => 'Which software problem sounds most like yours?',
        'text' => 'Start with the situation, not the technology.',
        'cards' => array(
            array(
                'problem' => 'Off-the-shelf software doesn\'t fit what we need.',
                'solution' => 'Start with Custom Software Development.'
            ),
            array(
                'problem' => 'Our team runs important processes from spreadsheets.',
                'solution' => 'Explore Internal Business Tools.'
            ),
            array(
                'problem' => 'Customers or partners need a better way to work with us.',
                'solution' => 'A Customer or Partner Portal may be the right solution.'
            ),
            array(
                'problem' => 'Our existing application is becoming difficult to maintain.',
                'solution' => 'Start with Software Modernization.'
            )
        )
    ),
    'why' => array(
        'eyebrow' => 'Why Skale',
        'title' => 'Build technology around the business not the other way around.',
        'text' => 'Software should make work easier, improve access to information, and support the way your business operates. Skale starts with the workflow and business requirements before deciding what should be built, replaced, integrated, or modernized.',
        'cards' => array(
            array(
                'number' => '01 / CLARITY',
                'title' => 'Start with the requirement',
                'description' => 'Understand what employees, customers, and the business actually need the technology to accomplish.'
            ),
            array(
                'number' => '02 / EXPERIENCE',
                'title' => 'Senior engineering experience',
                'description' => 'Work directly with more than two decades of software development, architecture, systems, and technical leadership experience.'
            ),
            array(
                'number' => '03 / SCALE',
                'title' => 'Plan beyond the first release',
                'description' => 'Build systems that can evolve as your users, data, workflows, and business requirements grow.'
            ),
            array(
                'number' => '04 / OUTCOMES',
                'title' => 'Solve measurable business problems',
                'description' => 'Focus on efficiency, usability, reliability, performance, and the ability to support future growth.'
            )
        )
    ),
    'related_categories' => array(
        'eyebrow' => 'Other Ways Skale Can Help',
        'title' => 'Technology problems often overlap.',
        'categories' => array(
            array(
                'title' => 'Websites & Conversion',
                'copy' => 'Build, repair, and optimize websites that support your business and convert more visitors.',
                'url' => $url_services_solutions . 'websites-and-conversion'
            ),
            array(
                'title' => 'Automation, CRM & Integrations',
                'copy' => 'Eliminate manual work and connect disconnected business systems.',
                'url' => $url_services_solutions . 'automation-crm-and-integrations'
            ),
            array(
                'title' => 'Marketing, Analytics & Growth',
                'copy' => 'Generate demand, measure performance, and make better growth decisions.',
                'url' => $url_services_solutions . 'marketing-analytics-and-growth'
            )
        )
    ),
    'finalCTA' => array(
        'eyebrow' => "Don't Know Where To Start?",
        'title' => "Tell me what's not working.",
        'description' => "You don't need to choose a service first. Explain the problem in a few sentences and I'll help determine the most practical next step.",
        'buttonText' => "Tell Me What's Not Working",
        'buttonUrl' => "/contact"
    ),
);