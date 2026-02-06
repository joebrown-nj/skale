<?php
declare(strict_types=1);

namespace App\Core;

use App\Models\NavModel;
use App\Models\ServiceModel;
use App\Models\PageContentModel;

class LoadSessionData
{
    // private NavController $navController;
    // private ServiceController $serviceController;
    private NavModel $navModel;
    private ServiceModel $serviceModel;
    private PageContentModel $pageContentModel;

    // public function __construct(NavController $navController, ServiceController $serviceController)
    public function __construct(NavModel $navModel, ServiceModel $serviceModel, PageContentModel $pageContentModel)
    {
        // echo "Loadsessiondata constructor...";die;
        // $this->navController = $navController;
        // $this->serviceController = $serviceController;
        $this->navModel = $navModel;
        $this->serviceModel = $serviceModel;
        $this->pageContentModel = $pageContentModel;
        $this->initializeSessionData();
    }

    public function initializeSessionData(): void
    {
        // unset($_SESSION);
        // $_SESSION['contactContent'] = '';
        // unset($_SESSION['contactContent']);

        // $_SESSION['nav'] = isset($_SESSION['nav']) ? $_SESSION['nav'] : $this->navModel->getNav('main', 0);
        // $_SESSION['footerNav'] = isset($_SESSION['footerNav']) ? $_SESSION['footerNav'] : $this->navModel->getNav('footer', 0);
        // $_SESSION['serviceList'] = isset($_SESSION['serviceList']) ? $_SESSION['serviceList'] : $this->serviceModel->getAllServices();
        // $_SESSION['contactContent'] = isset($_SESSION['contactContent']) ? $_SESSION['contactContent'] : $this->pageContentModel->getPageContentByUrl($_ENV['URL_CONTACT']);

        $_SESSION['nav'] = $this->navModel->getNav('main', 0);
        $_SESSION['footerNav'] = $this->navModel->getNav('footer', 0);
        $_SESSION['serviceList'] = $this->serviceModel->getAllServices();
        $_SESSION['contactContent'] = $this->pageContentModel->getPageContentByUrl($_ENV['URL_CONTACT']);

        // print_r($_SESSION['contactContent']['pageContent']->content);
        // die;
    }
}