<?php

namespace App\Controllers;

use App\Controller;
use App\Models\NavModel;

class NavController extends Controller
{
    public function getNav($parent=0): Array {
        $navModel = new NavModel();
        return $navModel->getNav($parent);
    }
}