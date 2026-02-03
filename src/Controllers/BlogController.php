<?php

namespace App\Controllers;

use App\Core\ErrorHandler;
use App\Core\Traits\RedirectTrait;
use App\Core\Traits\ValidateMethodTrait;
use App\Models\PageContentModel;
use App\Models\BlogModel;
use App\Core\View;
use App\Core\LoadSessionData;

class BlogController
{
    use ValidateMethodTrait;
    use RedirectTrait;

    private BlogModel $blogModel;
    private PageContentModel $pageContentModel;
    private View $view;
    private LoadSessionData $loadSessionData;

    public function __construct(BlogModel $blogModel, PageContentModel $pageContentModel, LoadSessionData $loadSessionData) {
        $this->blogModel = $blogModel;
        $this->pageContentModel = $pageContentModel;
        $this->view = new View();
        $this->loadSessionData = $loadSessionData;
    }

    public function index() {
        $this->view->render('blogList', array(
            'blogList' => $this->blogModel->getAllBlogs(),
            'pageContent' => $this->pageContentModel->getPageContentByUrl('blog'),
            'blogFeatured' => $this->blogModel->getFeaturedBlog()
        ));
    }

    public function archive() {
        $this->view->render('blogList', array(
            'blogList' => $this->blogModel->getBlogArchive(),
            'pageContent' => $this->pageContentModel->getPageContentByUrl('blog'),
        ));
    }

    public function getBlogDetail($date, $slug) {
        $blog = $this->blogModel->getBlogByUrl('blog/' . $date . '/' . $slug);
        $this->view->render('blogDetail', array(
            'blogList' => $this->blogModel->getAllBlogs(),
            'blogDetail' => $blog
        ));
    }
}