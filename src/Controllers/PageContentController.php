<?php

namespace App\Controllers;

use App\Models\PageContentModel;

class PageContentController
{
    private PageContentModel $pageContentModel;

    public function __construct(PageContentModel $pageContentModel) {
        $this->pageContentModel = $pageContentModel;
    }

    public function getPageContent($url=''): array|bool
    {
        $returnVal = $this->pageContentModel->getPageContentByUrl($url);
        return $returnVal;
    }
}
