<?php

namespace App\Controllers;

use App\Controller;
use App\Models\EmailModel;
use App\Models\HomePageModel;

class LeadController extends Controller
{
    private $homePageModel;

    public function __construct() {
        $this->homePageModel = new HomePageModel();
    }

    public function index()
    {
        $this->render('lead', array(
                'hero' => $this->homePageModel->getHeroContent(),
                'whyChooseUs' => $this->homePageModel->getWhyChooseUsContent(),
                'whyChooseUsHeading' => '<h3 class="BricolageGrotesque-ExtraBold fs-2">Why Choose <a href="/" class="mbtn lbc brand color" aria-describedby="why choose skale">Skale</a> for Your Business?</h3><p class="lead">We specialize in delivering comprehensive solutions that drive business growth. Here\'s why partnering with us is the right choice for your company.</p>'
            )
        );
    }
}