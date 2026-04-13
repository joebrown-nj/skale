<?php

namespace App\Controllers;

use App\Models\SolutionModel;
use App\Models\PageContentModel;
use App\Core\Contracts\ViewInterface;

class SolutionController
{
    private SolutionModel $SolutionModel;
    private PageContentModel $pageContentModel;
    private ViewInterface $view;

    public function __construct(SolutionModel $SolutionModel, PageContentModel $pageContentModel, ViewInterface $view) {
        $this->SolutionModel = $SolutionModel;
        $this->pageContentModel = $pageContentModel;
        $this->view = $view;
    }
 
    public function index() {
        $this->view->render('serviceList');
    }

    public function getSolutionDetail(string $slug) {
        $solution = $this->SolutionModel->getSolutionByUrl($slug);
        if(empty($solution)) {
            http_response_code(404);
            $this->view->render('error/404');
        }

        $pageContent = $this->pageContentModel->getPageContentByUrl($_ENV['URL_SERVICES_SOLUTIONS'].'/'.$slug);
        if(empty($pageContent) || $pageContent === false) {
            http_response_code(404);
            $this->view->render('error/404');
        }

        $this->view->render('serviceDetail', array(
            'serviceDetail' => $solution,
            'p1Page' => $this->pageContentModel->getPageContentByUrl($_ENV['URL_SERVICES_SOLUTIONS']),
        ));
    }
}
