<?php

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;
use App\Models\HomePageModel;
use App\Models\BlogModel;
use App\Models\PageContentModel;
use App\Core\LoadSessionData;

class HomeController
{
    private HomePageModel $homePageModel;
    private BlogModel $blogModel;
    private PageContentModel $pageContentModel;
    private EmailServiceInterface $emailModel;
    private ViewInterface $view;
    private LoadSessionData $loadSessionData;

    public function __construct(HomePageModel $homePageModel, PageContentModel $pageContentModel, BlogModel $blogModel, EmailServiceInterface $emailModel, LoadSessionData $loadSessionData, ViewInterface $view) {
        $this->homePageModel = $homePageModel;
        $this->pageContentModel = $pageContentModel;
        $this->blogModel = $blogModel;
        $this->emailModel = $emailModel;
        $this->view = $view;
        $this->loadSessionData = $loadSessionData;
    }

    public function index()
    {
        $wCU = $this->homePageModel->getWhyChooseUsContent();

        $data = array(
            'hero' => $this->homePageModel->getHeroContent(),
            'pageContent' => $this->pageContentModel->getPageContentByUrl(),
            'blogContent' => $this->pageContentModel->getPageContentByUrl('blog'),
            'blogFeatured' => $this->blogModel->getFeaturedBlog(),
            'blogList' => $this->blogModel->getAllBlogs(),
            'whyChooseUs' => $wCU,
            'whyChooseUsHeading' => count($wCU).' Reasons to Choose <a href="'.$_ENV['SITE_URL'].'" class="mbtn lbc brand color" aria-describedby="why choose skale">Skale</a> for Your Business',
             'whyChooseUsSubHeading' => 'We specialize in delivering comprehensive solutions that drive business growth.<br>Here\'s why partnering with us is the right choice for your company.',
        );

        $this->view->render('home', $data);
    }

    public function unsubscribe()
    {
        $successMessage = '';
        $errorMessage = '';

        if(!isset($_GET['email']) || !$this->emailModel->validateEmail($_GET['email'])){
            $errorMessage = 'A valid email is required to unsubscribe';
        } else {
            if($this->emailModel->emailListUnsubscribe($_GET['email'])){
                $successMessage = 'You have been unsubscribed';
            } else {
                $errorMessage = 'There was a problem unsubscribing you. Please try again later.';
            }
        }

        $this->view->render('unsubscribe', array(
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage
            )
        );
    }
}
