<?php

namespace App\Controllers;

use App\Core\View;
use App\Controllers\LogController;
use App\Models\HomePageModel;
use App\Models\EmailModel;
use App\Models\BlogModel;
use App\Models\PageContentModel;
use App\Core\LoadSessionData;

class HomeController
{
    private HomePageModel $homePageModel;
    private BlogModel $blogModel;
    private PageContentModel $pageContentModel;
    private View $view;
    private LoadSessionData $loadSessionData;

    public function __construct(HomePageModel $homePageModel, PageContentModel $pageContentModel, BlogModel $blogModel, LoadSessionData $loadSessionData) {
        $this->homePageModel = $homePageModel;
        $this->pageContentModel = $pageContentModel;
        $this->blogModel = $blogModel;
        $this->view = new View();
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
// print_r($data['pageContent']['pageContent']);
// die;
        $this->view->render('home', $data);
    }

//     public function emailTemplate()
//     {
// $msg = '<p>Hi Name,</p>';
// $msg .= '<p>Thanks for being awesome!</p>';
// $msg .= '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members.</p>';
// $msg .= '<p>Otherwise, we will reply by email as soon as possible.</p>';
// $msg .= '<p>Talk to you soon, '.$_ENV['SITE_NAME'].'</p>';
//         $emailModel = new EmailModel();
//         $template = $emailModel->emailTemplate($msg);
//         echo $template;
//     }

    public function unsubscribe()
    {
        $logController = new LogController();
        $emailModel = new EmailModel();
        $successMessage = '';
        $errorMessage = '';

        if(!isset($_GET['email']) || !$logController->validateEmail($_GET['email'])){
            $errorMessage = 'A valid email is required to unsubscribe';
        } else {
            if($emailModel->emailListUnsubscribe($_GET['email'])){
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