<?php

namespace App\Controllers;

use App\Controller;
use App\Models\ServiceModel;

class ServiceController extends Controller 
{
    private $serviceModel;

    public function __construct() {
        parent::__construct();
        $this->serviceModel = new ServiceModel();
    }
 
    public function index() {
        $serviceList = $this->serviceModel->getAllServices();
        $this->render('serviceList', $serviceList);
    }

    public function detail() {
        $service = $this->serviceModel->getServiceByUrl(substr($this->getUri(), 1));
        $service['icon'] = $this->serviceModel->showIcon($service['iconType'] == 'bootstrap' ? $service['iconBootstrap'] : $service['iconFontAwesome'], $service['iconType']);
        $this->render('serviceDetail', $service);
    }
}