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
        $totalCount = $this->blogModel->getBlogTotalCount();
        $numberOfpages = round($totalCount/$_ENV['BLOG_ITEMS_PER_PAGE']);
        $pagesArray = range(1, $numberOfpages);
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($currentPage - 1) * $_ENV['BLOG_ITEMS_PER_PAGE'];
        $this->view->render('blogArchive', array(
            'pageContent' => $this->pageContentModel->getPageContentByUrl('blog/'.$this->view->getP2()),
            'blogList' => $this->blogModel->getBlogArchive($start, $_ENV['BLOG_ITEMS_PER_PAGE']),
            'p1Content' => $this->pageContentModel->getPageContentByUrl('blog'),
            'totalCount' => $totalCount,
            'numberOfpages' => $numberOfpages,
            'currentPage' => $currentPage,
            'pagesArray' => $pagesArray
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