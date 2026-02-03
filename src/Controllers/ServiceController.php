<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\PageContentModel;
use App\Core\View;
use App\Core\LoadSessionData;

class ServiceController
{
    private ServiceModel $serviceModel;
    private PageContentModel $pageContentModel;
    private View $view;
    private LoadSessionData $loadSessionData;

    public function __construct(ServiceModel $serviceModel, LoadSessionData $loadSessionData, PageContentModel $pageContentModel) {
        $this->serviceModel = $serviceModel;
        $this->pageContentModel = $pageContentModel;
        $this->view = new View();
        $this->loadSessionData = $loadSessionData;
    }
 
    public function index() {
        // $serviceList = isset($_SESSION['serviceList']) ? $_SESSION['serviceList'] : $this->serviceModel->getAllServices();
        $this->view->render('serviceList', array(
            'pageContent' => $this->pageContentModel->getPageContentByUrl('services'),
        )); //, array('serviceList' => $serviceList));
    }

    public function getServiceDetail(string $slug) {
        // echo "slug: " . $slug;
        // echo "<br>";
        // echo "URI: " . substr($this->getUri(), 1);
        // die;
        $service = $this->serviceModel->getServiceByUrl($slug);
        // print_r($service); die;
        // $service->icon = $this->serviceModel->showIcon($service->iconType == 'bootstrap' ? $service->iconBootstrap : $service->iconFontAwesome, $service->iconType);
        $this->view->render('serviceDetail', array(
            'serviceDetail' => $service,
            'p1Content' => $this->pageContentModel->getPageContentByUrl('services'),
            'pageContent' => $this->pageContentModel->getPageContentByUrl('services/'.$slug),
        ));
    }
}