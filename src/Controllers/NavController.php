<?php

namespace App\Controllers;

use App\Models\NavModel;

class NavController
{
    private NavModel $navModel;

    public function __construct(NavModel $navModel) {
        $this->navModel = $navModel;
    }

    public function getNav(string $menuLocation, int $parent = 0): array {
        return $this->navModel->getNav($menuLocation, $parent);
    }
}