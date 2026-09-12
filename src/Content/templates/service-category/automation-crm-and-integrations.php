<?php

$url_services_solutions = '/'. $_ENV['URL_SERVICES_SOLUTIONS'] .'/';

return array(
    'hero' => array(
        'category_eyebrow' => 'Automation, CRM & Integrations',
        'title' => 'Make your systems work together and reduce the work your team does manually.',
        'copy' => 'Skale helps businesses automate repetitive processes, connect disconnected platforms, improve CRM workflows, and keep data moving reliably between the systems that depend on it.',
        'points' => array(
            'Repetitive manual work',
            'Disconnected systems',
            'CRM workflow problems',
            'Duplicate data entry'
        ),
        'actions' => array(
            array(
                'href' => '#services',
                'label' => 'Explore Automation Solutions',
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
                'title' => 'Your team keeps entering the same information',
                'description' => 'Employees copy customer, sales, or operational data between systems because the platforms you use don\'t communicate.'
            ),
            array(
                'title' => 'Your CRM isn\'t working the way you need',
                'description' => 'Leads are missed, follow-up is inconsistent, data is incomplete, or your CRM has become another system your team has to manage manually.'
            ),
            array(
                'title' => 'Too much work depends on repetitive tasks',
                'description' => 'Routine emails, updates, data entry, notifications, reporting, and handoffs consume time that could be spent on higher-value work.'
            ),
            array(
                'title' => 'Your business data is scattered',
                'description' => 'Customer and operational information lives across multiple tools, making it difficult to keep records accurate and understand what is happening.'
            )
        )
    ),
    'category_intro' => array(
        'eyebrow' => 'Find The Right Solution',
        'title' => 'Start with the process that\'s creating friction.',
        'copy' => 'You don\'t need to know whether the solution is automation, CRM configuration, an integration, or better data synchronization. Choose the situation that sounds closest to yours and explore how Skale can help.'
    ),
    'service_cards' => array(
        array(
            'service_number' => '01',
            'title' => 'Workflow Automation',
            'description' => 'Replace repetitive manual processes with automated workflows that move information, trigger actions, and keep work progressing without constant employee intervention.',
            'features' => array(
                'Process automation',
                'Automated notifications & follow-up',
                'Recurring task automation'
            ),
            'link' => $url_services_solutions . 'workflow-automation',
            'link_text' => 'Explore Workflow Automation'
        ),
        array(
            'service_number' => '02',
            'title' => 'System Integrations',
            'description' => 'Connect the platforms your business already uses so information can move reliably between websites, CRMs, marketing tools, internal systems, and third-party applications.',
            'features' => array(
                'API integrations',
                'Platform-to-platform connections',
                'Automated data movement'
            ),
            'link' => $url_services_solutions . 'system-integrations',
            'link_text' => 'Explore System Integrations'
        ),
        array(
            'service_number' => '03',
            'title' => 'CRM Solutions',
            'description' => 'Improve how your business captures leads, manages customer information, tracks opportunities, and follows up throughout the customer journey.',
            'features' => array(
                'CRM setup & optimization',
                'Lead management workflows',
                'CRM integrations'
            ),
            'link' => $url_services_solutions . 'crm-solutions',
            'link_text' => 'Explore CRM Solutions'
        ),
        array(
            'service_number' => '04',
            'title' => 'Marketing Automation',
            'description' => 'Connect marketing activity with customer data and automate follow-up so leads receive the right communication without relying on manual processes.',
            'features' => array(
                'Lead nurturing workflows',
                'Automated email sequences',
                'CRM & marketing integration'
            ),
            'link' => $url_services_solutions . 'marketing-automation',
            'link_text' => 'Explore Marketing Automation'
        ),
        // array(
        //     'service_number' => '05',
        //     'title' => 'Data Synchronization',
        //     'description' => 'Keep information consistent across multiple platforms by automatically synchronizing customer, product, operational, or marketing data.',
        //     'features' => array(
        //         'Cross-platform synchronization',
        //         'Data consistency',
        //         'Scheduled & event-based updates'
        //     ),
        //     'link' => $url_services_solutions . 'data-synchronization',
        //     'link_text' => 'Explore Data Synchronization'
        // ),
        array(
            'service_number' => '?',
            'title' => 'Not Sure What You Need?',
            'description' => 'If you know a process is inefficient or your systems aren\'t working together but aren\'t sure what the solution should be, start with the problem instead.',
            'features' => array(
                'Explain what\'s happening',
                'No technical diagnosis needed',
                'Get a practical recommendation'
            ),
            'link' => '/contact',
            'link_text' => 'Tell Me What\'s Not Working'
        )
    ),
    'help' => array(
        'eyebrow' => 'Still Deciding?',
        'title' => 'Which systems problem sounds most like yours?',
        'text' => 'Start with the situation—not the technology.',
        'cards' => array(
            array(
                'problem' => 'Our employees keep repeating the same tasks.',
                'solution' => 'Start with Workflow Automation.'
            ),
            array(
                'problem' => 'Our systems don\'t share information.',
                'solution' => 'Explore System Integrations.'
            ),
            array(
                'problem' => 'Our CRM isn\'t helping us manage leads effectively.',
                'solution' => 'Start with CRM Solutions.'
            ),
            array(
                'problem' => 'The same data is different depending on where we look.',
                'solution' => 'Data Synchronization may be the right starting point.'
            )
        )
    ),
    'why' => array(
        'eyebrow' => 'Why Skale',
        'title' => 'Improve the process, not just the individual platform.',
        'text' => 'Automation and integration problems rarely exist in isolation. A website form may feed a CRM, trigger marketing follow-up, update internal systems, and eventually appear in reporting. Skale looks at the entire workflow so improvements work together.',
        'cards' => array(
            array(
                'number' => '01 / CLARITY',
                'title' => 'Start with the workflow',
                'description' => 'Understand how work happens today and where unnecessary manual steps are creating friction.'
            ),
            array(
                'number' => '02 / EXPERIENCE',
                'title' => 'Senior technical experience',
                'description' => 'Work directly with more than two decades of software, automation, integration, and systems experience.'
            ),
            array(
                'number' => '03 / CONNECTION',
                'title' => 'Think across platforms',
                'description' => 'Connect CRM, websites, marketing platforms, internal systems, APIs, and data when needed.'
            ),
            array(
                'number' => '04 / OUTCOMES',
                'title' => 'Reduce operational friction',
                'description' => 'Measure success by saved time, better data, fewer manual steps, and more reliable business processes.'
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
                'title' => 'Software & Business Systems',
                'copy' => 'Build or modernize technology that supports how your business operates.',
                'url' => $url_services_solutions . 'software-and-business-systems'
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