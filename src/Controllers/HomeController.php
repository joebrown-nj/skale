<?php

namespace App\Controllers;

use App\Controller;
use App\Controllers\LogController;
use App\Models\HomePageModel;
use App\Models\EmailModel;
use App\Models\BlogModel;

class HomeController extends Controller
{
    private $homePageModel;
    private $pageContentController;
    private $blogModel;

    public function __construct() {
        $this->homePageModel = new HomePageModel();
        $this->pageContentController = new PageContentController();
        $this->blogModel = new BlogModel();
    }

    public function index()
    {
        $this->render('home', array(
                'hero' => $this->homePageModel->getHeroContent(),
                'blogContent' => $this->pageContentController->getPageContent('blog'),
                'blogFeatured' => $this->blogModel->getFeaturedBlog(),
                'blogList' => $this->blogModel->getAllBlogs(),
                'whyChooseUs' => $this->homePageModel->getWhyChooseUsContent(),
                'whyChooseUsHeading' => '<h3 class="BricolageGrotesque-ExtraBold fs-2">Why Choose <a href="/" class="mbtn lbc brand color" aria-describedby="why choose skale">Skale</a> for Your Business?</h3><p class="lead">We specialize in delivering comprehensive solutions that drive business growth. Here\'s why partnering with us is the right choice for your company.</p>'
            )
        );
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

        $this->render('unsubscribe', array(
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage
            )
        );
    }
}