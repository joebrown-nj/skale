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

    public function index()
    {
        // $data = array(
        //     'hero' => $this->homePageModel->getHeroContent(),
        //     'pageContent' => $this->pageContentModel->getPageContentByUrl('blog'),
        //     'blogFeatured' => $this->blogModel->getFeaturedBlog(),
        //     'blogList' => $this->blogModel->getAllBlogs(),
        //     'whyChooseUs' => $this->homePageModel->getWhyChooseUsContent(),
        //     'whyChooseUsHeading' => '<h3 class="BricolageGrotesque-ExtraBold fs-2">Why Choose <a href="/" class="mbtn lbc brand color" aria-describedby="why choose skale">Skale</a> for Your Business?</h3><p class="lead">We specialize in delivering comprehensive solutions that drive business growth. Here\'s why partnering with us is the right choice for your company.</p>'
        // );

        // if($this->getP1() == 'blog' && $this->getP3()) {
        //     $blogModel = new BlogModel();
        //     $blog = $blogModel->getBlogByUrl(substr($this->getUri(), 1));

        //     $metaData = json_encode(array(
        //         'keywords' => $blog->metaKeywords'],
        //         'description' => $blog->metaDescription'],
        //         'title' => $_ENV['SITE_NAME'].' blog | '.$blog->metaTitle'],
        //     ));
        // }

        // if($pageContent) {
        //     $metaData = json_encode(array(
        //         'keywords' => $pageContent['metaKeywords'],
        //         'description' => $pageContent['metaDescription'],
        //         'title' => $_ENV['SITE_NAME'].' | '.$pageContent['metaTitle'],
        //     ));
        // }

        // if($metaData) {
        //     echo $metaData;
        // }

        $p = explode('/', $_GET['slug']);

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
            $pageContent = $this->pageContentModel->getPageContentByUrl(substr($_GET['slug'], 1));

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