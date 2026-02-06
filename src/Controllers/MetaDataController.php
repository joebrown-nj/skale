<?php

namespace App\Controllers;

use App\Core\View;
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

    public function index($slug)
    {
        $adjustedSlug = urldecode($slug);
        $p = explode('/', $adjustedSlug);

        if(isset($p[1]) && $p[1] == 'blog' && isset($p[3])) {
            $blog = $this->blogModel->getBlogByUrl('blog/' . $p[2] . '/' . $p[3]);

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
            echo $metaData;
        }
    }
}