<?php
declare(strict_types=1);

namespace App\Core;

use App\Models\NavModel;
use App\Models\PageContentModel;
use App\Models\ServiceModel;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class SiteDataCache
{
    private const DEFAULT_TTL = 86400;

    public function __construct(
        private CacheInterface $cache,
        private NavModel $navModel,
        private ServiceModel $serviceModel,
        private PageContentModel $pageContentModel,
    ) {
    }

    public function getSharedData(): array
    {
        return [
            'nav' => $this->getMainNav(),
            'footerNav' => $this->getFooterNav(),
            'serviceList' => $this->getServiceList(),
            'contactContent' => $this->getContactContent(),
        ];
    }

    public function getMainNav(): array
    {
        return $this->cache->get('site_data.nav.main', function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->navModel->getNav('main', 0);
        });
    }

    public function getFooterNav(): array
    {
        return $this->cache->get('site_data.nav.footer', function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->navModel->getNav('footer', 0);
        });
    }

    public function getServiceList(): array
    {
        return $this->cache->get('site_data.services', function (ItemInterface $item): array {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->serviceModel->getAllServices() ?? [];
        });
    }

    public function getContactContent(): array|bool
    {
        return $this->cache->get('site_data.contact_content', function (ItemInterface $item): array|bool {
            $item->expiresAfter(self::DEFAULT_TTL);

            return $this->pageContentModel->getPageContentByUrl($_ENV['URL_CONTACT']);
        });
    }
}
