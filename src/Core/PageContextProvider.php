<?php
declare(strict_types=1);

namespace App\Core;

use App\Models\PageContentModel;

class PageContextProvider
{
    /**
     * @var array<string, array|null>
     */
    private array $resolvedPages = [];

    public function __construct(
        private PageContentModel $pageContentModel,
    ) {
    }

    public function resolve(?string $uri): ?array
    {
        $cacheKey = (string) ($uri ?? '');

        if (array_key_exists($cacheKey, $this->resolvedPages)) {
            return $this->resolvedPages[$cacheKey];
        }

        $page = $this->pageContentModel->getPageContentByUrl($cacheKey);
        $this->resolvedPages[$cacheKey] = $page === false ? null : $page;

        return $this->resolvedPages[$cacheKey];
    }
}
