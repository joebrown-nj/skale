<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\PageContentModel;
use App\Core\Contracts\ViewInterface;

class ServiceController
{
    private ServiceModel $serviceModel;
    private PageContentModel $pageContentModel;
    private ViewInterface $view;

    public function __construct(ServiceModel $serviceModel, PageContentModel $pageContentModel, ViewInterface $view) {
        $this->serviceModel = $serviceModel;
        $this->pageContentModel = $pageContentModel;
        $this->view = $view;
    }
 
    public function index() {
        $this->view->render('serviceList');
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
            'p1Page' => $this->pageContentModel->getPageContentByUrl('services'),
        ));
    }
}
