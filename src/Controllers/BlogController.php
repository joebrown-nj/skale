<?php

namespace App\Controllers;

use App\Controller;
use App\Models\blogModel;

class BlogController extends Controller
{
    private $blogModel;

    public function __construct() {
        parent::__construct();
        $this->blogModel = new BlogModel();
    }

    public function index() {
        $blogList = $this->blogModel->getAllBlogs();
        $this->render('blogList', $blogList);
    }

    public function detail($url='') {
        $blog = $this->blogModel->getBlogByUrl(substr($this->getUri(), 1));
        $this->render('blogDetail', $blog);
    }
}