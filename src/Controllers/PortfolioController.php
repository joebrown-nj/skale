<?php

namespace App\Controllers;

use App\Controller;

class PortfolioController extends Controller
{
    public function index()
    {
        $this->render('portfolio');
    }
}