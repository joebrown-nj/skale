<?php
declare(strict_types=1);

namespace App\Core;

use App\Models\NavModel;
use App\Models\PageContentModel;
use App\Models\SolutionModel;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class SiteDataCache
{
    private const DEFAULT_TTL = 86400;

    private ?array $sharedData = null;
    private ?array $mainNav = null;
    private ?array $footerNav = null;
    private ?array $serviceList = null;
    private ?array $allServiceList = null;
    private bool $contactContentResolved = false;
    private ?array $contactContent = null;

    public function __construct(
        private CacheInterface $cache,
        private NavModel $navModel,
        private SolutionModel $SolutionModel,
        private PageContentModel $pageContentModel,
    ) {
    }

    public function getSharedData(): array
    {
        if ($this->sharedData !== null) {
            return $this->sharedData;
        }

        $this->sharedData = [
            'nav' => $this->getMainNav(),
            'footerNav' => $this->getFooterNav(),
            'serviceList' => $this->getServiceList(),
            'allServiceList' => $this->getAllServiceList(),
            'contactContent' => $this->getContactContent(),
            'faq' => $this->getWebsiteFAQ(),
        ];

        return $this->sharedData;
    }


    public function getMainNav(): array
    {
        if ($this->mainNav !== null) {
            return $this->mainNav;
        }

        $this->mainNav = $this->cache->get('site_data.nav.main', function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->navModel->getNav('main', 0);
        });

        return $this->mainNav;
    }

    public function getFooterNav(): array
    {
        if ($this->footerNav !== null) {
            return $this->footerNav;
        }

        $this->footerNav = $this->cache->get('site_data.nav.footer', function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->navModel->getNav('footer', 0);
        });

        return $this->footerNav;
    }

    public function getServiceList(): array
    {
        if ($this->serviceList !== null) {
            return $this->serviceList;
        }

        $this->serviceList = $this->cache->get('site_data.solutions', function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->SolutionModel->getAllSolutions(true) ?? [];
        });

        return $this->serviceList;
    }

    public function getAllServiceList(): array
    {
        if ($this->allServiceList !== null) {
            return $this->allServiceList;
        }

        $this->allServiceList = $this->cache->get('site_data.solutions.all', function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->SolutionModel->getAllSolutions(false) ?? [];
        });

        return $this->allServiceList;
    }

    public function getContactContent(): ?array
    {
        if ($this->contactContentResolved) {
            return $this->contactContent;
        }

        $this->contactContent = $this->cache->get('site_data.contact_content', function (ItemInterface $item): ?array {
            $item->expiresAfter(self::DEFAULT_TTL);

            $page = $this->pageContentModel->getPageContentByUrl($_ENV['URL_CONTACT']);

            return $page === false ? null : $page;
        });

        $this->contactContentResolved = true;

        return $this->contactContent;
    }

    public function getWebsiteFAQ(): array
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
}
