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

    public function index($p1 = '', $p2 = '', $p3 = ''): void
    {
        // $adjustedSlug = urldecode($slug);
        $adjustedSlug = $p1;
        if($p2) $adjustedSlug .= '/' . $p2;
        if($p3) $adjustedSlug .= '/' . $p3;
        $adjustedSlug = trim($adjustedSlug, '/');
        // $p = explode('/', $adjustedSlug);
// echo 'p1: ' . $p1 . ', p2: ' . $p2 . ', p3: ' . $p3;
// die;
// return;

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
                // echo $adjustedSlug;
                // echo $pageContent['pageContent']->id;
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