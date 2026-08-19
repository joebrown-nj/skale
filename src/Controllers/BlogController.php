final <?php

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

    #[\Override]
    protected function getView(): ViewInterface
    {
        return $this->view;
    }

    private function getSelectedCategory(): ?string
    {
        $category = isset($_GET['category']) ? trim((string) $_GET['category']) : '';

        return $category === '' ? null : $category;
    }

    public function index(): void
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
}
