<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\LoadSessionData;
use App\Models\PageContentModel;

class SubPageController
{
    private PageContentModel $pageContentModel;
    private View $view;
    private LoadSessionData $loadSessionData;

    public function __construct(PageContentModel $pageContentModel, LoadSessionData $loadSessionData, View $view) {
        $this->pageContentModel = $pageContentModel;
        $this->view = $view;
        $this->loadSessionData = $loadSessionData;
    }

    public function index()
    {
        $this->view->render('subpage', array(
            'pageContent' => $this->pageContentModel->getPageContentByUrl($this->view->getUri())
        ));
    }
}
