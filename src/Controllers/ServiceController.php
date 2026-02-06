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
        $this->view->render('serviceList', array(
            'pageContent' => $this->pageContentModel->getPageContentByUrl('services'),
        ));
    }

    public function getServiceDetail(string $slug) {
        $service = $this->serviceModel->getServiceByUrl($slug);
        if(empty($service)) {
            http_response_code(404);
            $this->view->render('error/404');
        }

        $pageContent = $this->pageContentModel->getPageContentByUrl('services/'.$slug);
        if(empty($pageContent) || $pageContent === false) {
            http_response_code(404);
            $this->view->render('error/404');
        }

        $this->view->render('serviceDetail', array(
            'serviceDetail' => $service,
            'p1Content' => $this->pageContentModel->getPageContentByUrl('services'),
            'pageContent' => $pageContent,
        ));
    }
}