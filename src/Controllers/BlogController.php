<?php

namespace App\Controllers;

use App\Controller;
use App\Controllers\PageContentController;
use App\Models\BlogModel;

class BlogController extends Controller
{
    private $blogModel;
    private $pageContentController;

    public function __construct() {
        parent::__construct();
        $this->blogModel = new BlogModel();
        $this->pageContentController = new pageContentController();
    }

    public function index() {
        $this->render('blogList', array(
            'blogList' => $this->blogModel->getAllBlogs(),
            'blogContent' => $this->pageContentController->getPageContent('blog'),
            'blogFeatured' => $this->blogModel->getFeaturedBlog()
        ));
    }

    public function detail() {
        $blog = $this->blogModel->getBlogByUrl(substr($this->getUri(), 1));
        $this->render('blogDetail', array(
            'blogList' => $this->blogModel->getAllBlogs(),
            'blogDetail' => $blog
        ));
    }
}