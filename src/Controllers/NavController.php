<?php

namespace App\Controllers;

use App\Models\NavModel;

class NavController
{
    private NavModel $navModel;

    public function __construct(NavModel $navModel) {
        $this->navModel = $navModel;
    }

    public function getNav($parent=0): Array {
        return $this->navModel->getNav($parent);
    }
}