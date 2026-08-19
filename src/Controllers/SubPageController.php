<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Contracts\ViewInterface;

class SubPageController
{
    private ViewInterface $view;

    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render('subpage');
    }

    public function thankYou()
    {
        $this->view->render('thankYou');
    }
}
