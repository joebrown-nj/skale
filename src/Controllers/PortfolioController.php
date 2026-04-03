<?php

namespace App\Controllers;
use App\Core\View;
use App\Models\PageContentModel;
use App\Models\PortfolioModel;

class PortfolioController
{
    private View $view;
    private PageContentModel $pageContentModel;
    private PortfolioModel $portfolioModel;

    public function __construct(PageContentModel $pageContentModel, PortfolioModel $portfolioModel, View $view) {
        $this->view = $view;
        $this->pageContentModel = $pageContentModel;
        $this->portfolioModel = $portfolioModel;
    }

    public function index()
    {
        $data = array(
            'pageContent' => $this->pageContentModel->getPageContentByUrl('portfolio'),
            'portfolioItems' => $this->portfolioModel->getPortfolioItems(),
        );
        $this->view->render('portfolio', $data);
    }
}
