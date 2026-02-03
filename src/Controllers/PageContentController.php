<?php

namespace App\Controllers;

use App\Models\PageContentModel;
use App\Models\Entities\PageContentEntity;

class PageContentController
{
    private PageContentModel $pageContentModel;

    public function __construct(PageContentModel $pageContentModel) {
        $this->pageContentModel = $pageContentModel;
    }

    public function getPageContent($url=''): PageContentEntity | NULL
    {
        $returnVal = $this->pageContentModel->getPageContentByUrl($url);
        return $returnVal;
    }
}