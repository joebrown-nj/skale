<?php

namespace App\Controllers;

use App\Controllers\UserController;
use App\Models\LogModel;

class LogController {
    private UserController $userController;
    private LogModel $logModel;
    private array $user;

    public function __construct(UserController $userController, LogModel $logModel) {
        $this->userController = $userController;
        $this->logModel = $logModel;
        $this->user = $this->userController->getUserLocation();
    }

    public function getUser(){
        return $this->user;
    }

    public function logButtonClick() {
        $data = Array (
            'target' => isset($_POST['target']) ? $_POST['target'] : '',
            'url' => isset($_POST['url']) ? $_POST['url'] : '',
            'detail' => isset($_POST['detail']) ? $_POST['detail'] : '',
            'userIP' => $_SERVER['REMOTE_ADDR'],
            'userInfo' => json_encode($this->user),
            'serverInfo' => json_encode($_SERVER)
        );

        return $this->logModel->logButtonClick($data);
    }


}