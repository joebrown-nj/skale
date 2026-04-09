<?php

namespace App\Controllers;
use App\Core\Contracts\ViewInterface;
use App\Models\PageContentModel;

class SubPageController
{
    private PageContentModel $pageContentModel;
    private ViewInterface $view;

    public function __construct(PageContentModel $pageContentModel, ViewInterface $view) {
        $this->pageContentModel = $pageContentModel;
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render('subpage', array(
            'pageContent' => $this->pageContentModel->getPageContentByUrl($this->view->getUri())
        ));
    }
}
