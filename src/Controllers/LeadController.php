<?php

namespace App\Controllers;

use App\Models\EmailModel;
use App\Models\HomePageModel;
use App\Core\View;
use App\Core\LoadSessionData;

class LeadController
{
    private HomePageModel $homePageModel;
    private View $view;
    private LoadSessionData $loadSessionData;

    public function __construct(HomePageModel $homePageModel, LoadSessionData $loadSessionData) {
        $this->homePageModel = $homePageModel;
        $this->view = new View();
        $this->loadSessionData = $loadSessionData;
    }

    public function index()
    {
        $this->view->render('lead', array(
                'hero' => $this->homePageModel->getHeroContent(),
                'whyChooseUs' => $this->homePageModel->getWhyChooseUsContent(),
                'whyChooseUsHeading' => '<h3 class="BricolageGrotesque-ExtraBold fs-2">Why Choose <a href="'.$_ENV['SITE_URL'].'" class="mbtn lbc brand color" aria-describedby="why choose skale">Skale</a> for Your Business?</h3><p class="lead">We specialize in delivering comprehensive solutions that drive business growth. Here\'s why partnering with us is the right choice for your company.</p>'
            )
        );
    }
}