<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\PageContentModel;

class MetaDataController
{
    private BlogModel $blogModel;
    private PageContentModel $pageContentModel;

    public function __construct(PageContentModel $pageContentModel, BlogModel $blogModel) {
        $this->pageContentModel = $pageContentModel;
        $this->blogModel = $blogModel;
    }

    public function index($p1 = '', $p2 = '', $p3 = ''): void
    {
        $metaData = null;
        $adjustedSlug = $p1;
        if($p2) $adjustedSlug .= '/' . $p2;
        if($p3) $adjustedSlug .= '/' . $p3;
        $adjustedSlug = trim($adjustedSlug, '/');

        if($p1 == 'blog' && $p2 && $p3) {
            $blog = $this->blogModel->getBlogByUrl('blog/' . $p2 . '/' . $p3);

            if($blog) {
                $metaData = json_encode(array(
                    'keywords' => $blog->metaKeywords,
                    'description' => $blog->metaDescription,
                    'title' => $_ENV['SITE_NAME'].' blog | '.$blog->metaTitle,
                ));
            }
        } else {
            $pageContent = $this->pageContentModel->getPageContentByUrl($adjustedSlug);

            if($pageContent) {
                $metaData = json_encode(array(
                    'keywords' => $pageContent['pageContent']->metaKeywords,
                    'description' => $pageContent['pageContent']->metaDescription,
                    'title' => $_ENV['SITE_NAME'].' | '.$pageContent['pageContent']->metaTitle,
                ));
            }
        }

        if($metaData) {
            echo trim($metaData);
        }

        return;
    }
}
