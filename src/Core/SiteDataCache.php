<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\Contracts\UserLocationProviderInterface;
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
    private ?array $hiddenLinks = null;
    private ?array $userLocation = null;

    public function __construct(
        private CacheInterface $cache,
        private NavModel $navModel,
        private SolutionModel $SolutionModel,
        private PageContentModel $pageContentModel,
        private UserLocationProviderInterface $userLocationProvider,
    ) {
        $this->sharedData = null;
        $this->mainNav = null;
        $this->footerNav = null;
        $this->serviceList = null;
        $this->allServiceList = null;
        $this->contactContentResolved = false;
        $this->contactContent = null;
        $this->hiddenLinks = null;
        $this->userLocation = null;
    }

    public function getSharedData(): array
    {
        // $this->sharedData = null;
        if ($this->sharedData !== null) {
            return $this->sharedData;
        }

        $this->sharedData = [
            'nav' => $this->getMainNav(),
            'footerNav' => $this->getFooterNav(),
            'serviceList' => $this->getServiceList(),
            'allServiceList' => $this->getAllServiceList(),
            'contactContent' => $this->getContactContent(),
            'hiddenLinks' => $this->getHiddenLinks(),
        ];

        return $this->sharedData;
    }

    public function getUserLocation(): array
    {
        if ($this->userLocation !== null) {
            return $this->userLocation;
        }

        $ipAddress = $this->userLocationProvider->getIPAddress();
        $cacheKey = 'site_data.user_location.' . hash('sha256', $ipAddress);

        $this->userLocation = $this->cache->get($cacheKey, function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->userLocationProvider->getUserLocation();
        });

        return $this->userLocation;
    }


    public function getMainNav(): array
    {
        //$this->cache->delete('site_data.nav.main');
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
        //$this->cache->delete('site_data.nav.footer');
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
        //$this->cache->delete('site_data.solutions');
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
        //$this->cache->delete('site_data.solutions.all');
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
        //$this->cache->delete('site_data.contact_content');
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

    public function getHiddenLinks(): array
    {
        //$this->cache->delete('site_data.nav.hidden');
        if ($this->hiddenLinks !== null) {
            return $this->hiddenLinks;
        }

        $this->hiddenLinks = $this->cache->get('site_data.nav.hidden', function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->navModel->getAllNav();
        });

        return $this->hiddenLinks;
    }
}
