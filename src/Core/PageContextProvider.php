<?php
declare(strict_types=1);

namespace App\Core;

use App\Models\PageContentModel;

class PageContextProvider
{
    public function __construct(
        private PageContentModel $pageContentModel,
    ) {
    }

    public function resolve(?string $uri): ?array
    {
        $page = $this->pageContentModel->getPageContentByUrl($uri ?? '');

        return $page === false ? null : $page;
    }
}
