final <?php

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;
use App\Models\HomePageModel;
use App\Models\BlogModel;
use App\Models\PageContentModel;
use App\Models\HomeCardsModel;

class HomeController
{
    private HomePageModel $homePageModel;
    private HomeCardsModel $homeCardsModel;
    private BlogModel $blogModel;
    private PageContentModel $pageContentModel;
    private EmailServiceInterface $emailModel;
    private ViewInterface $view;

    public function index(): void
    {
        // $wCU = $this->homePageModel->getWhyChooseUsContent();
        $blogPage = $this->pageContentModel->getPageContentByUrl('blog');

        $data = [
            'hero' => $this->homePageModel->getHeroContent(),
            'homeCards' => $this->homeCardsModel->getHomeCards(),
            'blogContent' => $blogPage !== false ? $blogPage['content'] : null,
            'blogFeatured' => $this->blogModel->getFeaturedBlog(),
            'blogList' => $this->blogModel->getAllBlogs(),
            'howItWorks' => $this->homePageModel->getHowItWorksContent(),
            'theResults' => $this->homePageModel->getTheResultsContent(),
        ];

        $this->view->render('home', $data);
    }
}
