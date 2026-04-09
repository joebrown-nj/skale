<?php

namespace App\Controllers;

use App\Models\HomePageModel;
use App\Core\Contracts\ViewInterface;

class LeadController
{
    private HomePageModel $homePageModel;
    private ViewInterface $view;

    public function __construct(HomePageModel $homePageModel, ViewInterface $view) {
        $this->homePageModel = $homePageModel;
        $this->view = $view;
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
