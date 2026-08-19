<?php

namespace App\Controllers;

use App\Core\ErrorHandler;
use App\Core\Contracts\ViewInterface;
use App\Core\Traits\RedirectTrait;
use App\Core\Traits\ValidateMethodTrait;
use App\Models\PageContentModel;
use App\Models\BlogModel;
use App\Core\Config\SiteConfig;

class BlogController
{
    use ValidateMethodTrait;
    use RedirectTrait;

    private BlogModel $blogModel;
    private PageContentModel $pageContentModel;
    private ViewInterface $view;

    public function __construct(BlogModel $blogModel, PageContentModel $pageContentModel, ViewInterface $view, private readonly SiteConfig $siteConfig)
    {
        $this->blogModel = $blogModel;
        $this->pageContentModel = $pageContentModel;
        $this->view = $view;
    }

    protected function getView(): ViewInterface
    {
        return $this->view;
    }

    private function getSelectedCategory(): ?string
    {
        $category = isset($_GET['category']) ? trim((string) $_GET['category']) : '';

        return $category === '' ? null : $category;
    }

    public function index()
    {
        $selectedCategory = $this->getSelectedCategory();

        $this->view->render('blogList', [
            'blogList' => $this->blogModel->getAllBlogs($selectedCategory),
            'blogFeatured' => $this->blogModel->getFeaturedBlog(),
            'blogCategories' => $this->blogModel->getBlogCategories(),
            'activeCategory' => $selectedCategory,
            'filterPath' => $this->siteConfig->url . 'blog',
        ]);
    }

    public function archive()
    {
        $selectedCategory = $this->getSelectedCategory();
        $totalCount = $this->blogModel->getBlogTotalCount($selectedCategory);
        $numberOfpages = $totalCount > 0 ? (int) ceil($totalCount / $this->siteConfig->blogItemsPerPage) : 0;
        $pagesArray = $numberOfpages > 0 ? range(1, $numberOfpages) : [];
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $currentPage = max(1, $currentPage);
        $start = ($currentPage - 1) * $this->siteConfig->blogItemsPerPage;

        $this->view->render('blogArchive', [
            'blogList' => $this->blogModel->getBlogArchive($start, $this->siteConfig->blogItemsPerPage, $selectedCategory),
            'p1Page' => $this->pageContentModel->getPageContentByUrl('blog'),
            'totalCount' => $totalCount,
            'numberOfpages' => $numberOfpages,
            'currentPage' => $currentPage,
            'pagesArray' => $pagesArray,
            'blogCategories' => $this->blogModel->getBlogCategories(),
            'activeCategory' => $selectedCategory,
            'filterPath' => $this->siteConfig->url . 'blog/archive',
        ]);
    }

    public function getBlogDetail($date, $slug)
    {
        $blog = $this->blogModel->getBlogByUrl('blog/' . $date . '/' . $slug);
        $this->view->render('blogDetail', [
            'blogList' => $this->blogModel->getAllBlogs(),
            'blogDetail' => $blog,
        ]);
    }
}
