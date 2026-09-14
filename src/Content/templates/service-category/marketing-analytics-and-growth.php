<?php

$url_services_solutions = '/'. $_ENV['URL_SERVICES_SOLUTIONS'] .'/';

return array(
    'hero' => array(
        'category_eyebrow' => 'Marketing, Analytics & Growth',
        'title' => 'Generate better opportunities and understand what is actually driving growth.',
        'copy' => 'Skale helps businesses improve digital marketing, attract more qualified visitors, convert attention into opportunities, connect marketing activity with customer data, and build reporting that makes performance easier to understand.',
        'points' => array(
            'Not enough qualified traffic',
            'Marketing that isn\'t converting',
            'Unclear campaign performance',
            'Disconnected reporting'
        ),
        'actions' => array(
            array(
                'href' => '#services',
                'label' => 'Explore Marketing Solutions',
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
                'title' => 'You need more qualified traffic',
                'description' => 'Your website isn\'t attracting enough of the people who are most likely to become customers.'
            ),
            array(
                'title' => 'You\'re spending money but don\'t know what is working',
                'description' => 'Campaigns are running across multiple channels, but it is difficult to connect activity with leads, opportunities, and revenue.'
            ),
            array(
                'title' => 'Marketing activity isn\'t turning into opportunities',
                'description' => 'Traffic, advertising, email, and content generate attention, but too few visitors take the next step.'
            ),
            array(
                'title' => 'Reporting is scattered across different platforms',
                'description' => 'Important performance information lives in separate dashboards and spreadsheets, making it difficult to see the complete picture.'
            )
        )
    ),
    'category_intro' => array(
        'eyebrow' => 'Find The Right Solution',
        'title' => 'Start with the growth problem you\'re trying to solve.',
        'copy' => 'You don\'t need to know whether the answer is SEO, paid advertising, email, analytics, reporting, or a broader strategy. Choose the situation that sounds closest to yours and explore how Skale can help.'
    ),
    'service_cards' => array(
        array(
            'service_number' => '01',
            'title' => 'Online Marketing',
            'description' => 'Create a coordinated digital marketing approach that connects your website, search, advertising, email, content, analytics, and customer journey.',
            'features' => array(
                'Digital marketing planning',
                'Channel coordination',
                'Campaign optimization'
            ),
            'link' => $url_services_solutions . 'online-marketing',
            'link_text' => 'Explore Online Marketing'
        ),
        array(
            'service_number' => '02',
            'title' => 'SEO',
            'description' => 'Improve your visibility in search and attract people actively looking for the products, services, and expertise your business provides.',
            'features' => array(
                'Technical SEO',
                'On-page optimization',
                'Search content strategy'
            ),
            'link' => $url_services_solutions . 'search-engine-optimization',
            'link_text' => 'Explore SEO'
        ),
        array(
            'service_number' => '03',
            'title' => 'PPC / Paid Advertising',
            'description' => 'Use targeted paid campaigns to reach potential customers while improving landing pages, measurement, and conversion paths around that traffic.',
            'features' => array(
                'Paid search campaigns',
                'Paid social campaigns',
                'Campaign & landing page optimization'
            ),
            'link' => $url_services_solutions . 'ppc-solutions',
            'link_text' => 'Explore Paid Advertising'
        ),
        array(
            'service_number' => '04',
            'title' => 'Email Marketing',
            'description' => 'Use email to nurture leads, stay connected with customers, promote relevant offers, and support longer customer journeys.',
            'features' => array(
                'Email campaigns',
                'Lead nurturing',
                'Performance optimization'
            ),
            'link' => $url_services_solutions . 'email-marketing',
            'link_text' => 'Explore Email Marketing'
        ),
        // array(
        //     'service_number' => '05',
        //     'title' => 'Marketing Analytics',
        //     'description' => 'Connect marketing activity with meaningful performance data so you can understand which channels, campaigns, and customer journeys are producing results.',
        //     'features' => array(
        //         'Campaign measurement',
        //         'Conversion tracking',
        //         'Channel performance analysis'
        //     ),
        //     'link' => $url_services_solutions . 'marketing-analytics',
        //     'link_text' => 'Explore Marketing Analytics'
        // ),
        array(
            'service_number' => '06',
            'title' => 'Analytics & Reporting',
            'description' => 'Turn scattered data into useful reports and dashboards that make performance easier to monitor, understand, and act on.',
            'features' => array(
                'Reporting dashboards',
                'Cross-platform reporting',
                'Business performance insights'
            ),
            'link' => $url_services_solutions . 'analytics-reporting',
            'link_text' => 'Explore Analytics & Reporting'
        ),
        array(
            'service_number' => '07',
            'title' => 'Strategy & Optimization',
            'description' => 'Identify where growth is being constrained, prioritize the highest-impact opportunities, and continuously improve the systems supporting marketing and customer acquisition.',
            'features' => array(
                'Growth strategy',
                'Performance reviews',
                'Continuous optimization'
            ),
            'link' => $url_services_solutions . 'strategy-and-optimization',
            'link_text' => 'Explore Strategy & Optimization'
        ),
        array(
            'service_number' => '?',
            'title' => 'Not Sure What You Need?',
            'description' => 'If you know your marketing isn\'t producing the results you want but aren\'t sure which channel or strategy needs attention, start with the problem instead.',
            'features' => array(
                'Explain what\'s happening',
                'No marketing diagnosis needed',
                'Get a practical recommendation'
            ),
            'link' => '/contact',
            'link_text' => 'Tell Me What\'s Not Working'
        )
    ),
    'help' => array(
        'eyebrow' => 'Still Deciding?',
        'title' => 'Which growth problem sounds most like yours?',
        'text' => 'Start with the situation, not the channel.',
        'cards' => array(
            array(
                'problem' => 'We need more people to find our business.',
                'solution' => 'Start with SEO or Online Marketing.'
            ),
            array(
                'problem' => 'We want to generate traffic and leads more quickly.',
                'solution' => 'Explore PPC / Paid Advertising.'
            ),
            array(
                'problem' => 'We have leads but need better follow-up and nurturing.',
                'solution' => 'Start with Email Marketing.'
            ),
            array(
                'problem' => 'We have data everywhere but can\'t tell what is actually working.',
                'solution' => 'Start with Analytics & Reporting.'
            )
        )
    ),
    'why' => array(
        'eyebrow' => 'Why Skale',
        'title' => 'Connect marketing activity to measurable business outcomes.',
        'text' => 'Marketing doesn\'t end with traffic. Visitors move through websites, forms, CRM systems, email follow-up, sales processes, and reporting. Skale can look across the entire journey instead of optimizing one channel in isolation.',
        'cards' => array(
            array(
                'number' => '01 / CLARITY',
                'title' => 'Start with the objective',
                'description' => 'Identify whether the real problem is traffic, targeting, messaging, conversion, follow-up, measurement, or something else.'
            ),
            array(
                'number' => '02 / CONNECTION',
                'title' => 'Connect the customer journey',
                'description' => 'Consider marketing, websites, CRM, automation, analytics, and reporting together when needed.'
            ),
            array(
                'number' => '03 / MEASUREMENT',
                'title' => 'Know what is working',
                'description' => 'Build better tracking and reporting around the activity that contributes to leads, customers, and growth.'
            ),
            array(
                'number' => '04 / OUTCOMES',
                'title' => 'Optimize for business results',
                'description' => 'Focus on qualified traffic, conversions, opportunities, efficiency, and measurable improvement.'
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
                'url' => 'websites-and-conversion'
            ),
            array(
                'title' => 'Automation, CRM & Integrations',
                'copy' => 'Eliminate manual work and connect disconnected business systems.',
                'url' => 'automation-crm-and-integrations'
            ),
            array(
                'title' => 'Software & Business Systems',
                'copy' => 'Build or modernize technology that supports how your business operates.',
                'url' => 'software-and-business-systems'
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