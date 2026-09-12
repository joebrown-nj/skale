<?php

$url_services_solutions = '/'. $_ENV['URL_SERVICES_SOLUTIONS'] .'/';

return array(
    'hero' => array(
        'category_eyebrow' => 'Websites & Conversion',
        'title' => 'Turn your website into a better part of your business.',
        'copy' => 'Whether your website needs to be rebuilt, repaired, optimized, or converted into a stronger lead-generation tool, Skale helps identify what isn\'t working and improve the parts that matter most.',
        'points' => array(
            'Low conversion rates',
            'Outdated websites',
            'WordPress problems',
            'Weak landing pages'
        ),
        'actions' => array(
            array(
                'href' => '#services',
                'label' => 'Explore Website Solutions',
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
                'title' => 'Visitors aren\'t converting',
                'description' => 'You\'re getting traffic but not enough inquiries, calls, or sales opportunities.'
            ),
            array(
                'title' => 'Your website feels outdated',
                'description' => 'Your online presence no longer reflects the business you\'ve become.'
            ),
            array(
                'title' => 'Something is broken',
                'description' => 'Forms, mobile layouts, performance, plugins, or integrations aren\'t working correctly.'
            ),
            array(
                'title' => 'Campaigns need better pages',
                'description' => 'You\'re paying for traffic but sending visitors to pages that aren\'t built to convert.'
            )
        )
    ),
    'category_intro' => array(
        'eyebrow' => 'Find The Right Solution',
        'title' => 'Start with what you\'re trying to fix.',
        'copy' => 'You don\'t need to know whether you need development, optimization, WordPress help, or an entirely new website. Choose the situation that sounds closest to yours and explore how Skale can help.'
    ),
    'service_cards' => array(
        array(
            'service_number' => '01',
            'title' => 'Website Development',
            'description' => 'Build a professional website that clearly explains what your business does, builds trust, works across devices, and supports your goals.',
            'features' => array(
                'New website builds',
                'Website redesigns',
                'Responsive development'
            ),
            'link' => $url_services_solutions . 'website-design-and-development',
            'link_text' => 'Explore Website Development'
        ),
        array(
            'service_number' => '02',
            'title' => 'WordPress Development',
            'description' => 'Improve, extend, repair, or rebuild WordPress websites without forcing your business into an inflexible off-the-shelf solution.',
            'features' => array(
                'Custom WordPress development',
                'Themes & functionality',
                'Performance improvements'
            ),
            'link' => $url_services_solutions . 'wordpress-development',
            'link_text' => 'Explore WordPress Development'
        ),
        array(
            'service_number' => '03',
            'title' => 'Website Rescue',
            'description' => 'Fix the highest-impact problems on an existing website without getting dragged into a full redesign that you may not need.',
            'features' => array(
                'Broken forms & functionality',
                'Performance problems',
                'Mobile & conversion issues'
            ),
            'link' => '/website-rescue',
            'link_text' => 'Explore Website Rescue'
        ),
        array(
            'service_number' => '04',
            'title' => 'Conversion Optimization',
            'description' => 'Find out why visitors aren\'t taking action and improve the messaging, experience, forms, and conversion paths holding them back.',
            'features' => array(
                'Conversion reviews',
                'CTA & form optimization',
                'A/B testing'
            ),
            'link' => $url_services_solutions . 'conversion-optimization',
            'link_text' => 'Improve Conversions'
        ),
        // array(
        //     'service_number' => '05',
        //     'title' => 'Landing Pages',
        //     'description' => 'Create focused pages for paid ads, campaigns, products, and services that move visitors toward one clear conversion goal.',
        //     'features' => array(
        //         'PPC landing pages',
        //         'Lead-generation pages',
        //         'A/B test variants'
        //     ),
        //     'link' => $url_services_solutions . 'landing-pages',
        //     'link_text' => 'Explore Landing Pages'
        // ),
        array(
            'service_number' => '?',
            'title' => 'Not Sure What You Need?',
            'description' => 'If you know something about your website isn\'t working but aren\'t sure what the solution should be, start with the problem instead.',
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
        'title' => 'Which website problem sounds most like yours?',
        'text' => 'Start with the situation, not the technology.',
        'cards' => array(
            array(
                'problem' => 'We need an entirely new site.',
                'solution' => 'Start with Website Development.'
            ),
            array(
                'problem' => 'Our current WordPress site needs work.',
                'solution' => 'Explore WordPress Development.'
            ),
            array(
                'problem' => 'The site is mostly fine, but things are broken.',
                'solution' => 'Website Rescue may be the right starting point.'
            ),
            array(
                'problem' => 'We get visitors but they don\'t become leads.',
                'solution' => 'Start with Conversion Optimization.'
            )
        )
    ),
    'why' => array(
        'eyebrow' => 'Why Skale',
        'title' => 'Solve the business problem, not just the website problem.',
        'text' => 'Your website usually doesn\'t operate alone. Leads may need to enter a CRM, trigger follow-up, connect to marketing campaigns, feed analytics, or integrate with internal systems. Skale can look beyond the page itself when the problem requires it.',
        'cards' => array(
            array(
                'number' => '01 / CLARITY',
                'title' => 'Start with what\'s wrong',
                'description' => 'Understand the underlying business problem before choosing a solution.'
            ),
            array(
                'number' => '02 / EXPERIENCE',
                'title' => 'Senior technical experience',
                'description' => 'Work directly with more than two decades of web, software, and systems experience.'
            ),
            array(
                'number' => '03 / CONNECTION',
                'title' => 'Think beyond one platform',
                'description' => 'Consider websites, CRM, automation, analytics, software, and marketing together when needed.'
            ),
            array(
                'number' => '04 / OUTCOMES',
                'title' => 'Focus on meaningful improvements',
                'description' => 'Measure success by the impact on your business, not just the website.'
            )
        )
    ),
    'related_categories' => array(
        'eyebrow' => 'Other Ways Skale Can Help',
        'title' => 'Technology problems often overlap.',
        'categories' => array(
            array(
                'title' => 'Automation, CRM & Integrations',
                'copy' => 'Eliminate manual work and connect disconnected business systems.',
                'url' => $url_services_solutions . 'automation-crm-and-integrations'
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
