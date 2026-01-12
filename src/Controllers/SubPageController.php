<?php

namespace App\Controllers;

use App\Controller;

class SubPageController extends Controller
{
    public function index()
    {
        $this->render('subpage');
    }
}