<?php

namespace App\Controllers;

use MysqliDb;
use App\Controllers\UserController;

class LogController {
    private $db;
    private $user;

    public function __construct() {
        $userController = new UserController();
        $this->user = $userController->getUserLocation();
        $this->db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    }

    public function getUser(){
        return $this->user;
    }

    public function logButtonClick() {
        $data = Array ('target' => isset($_POST['target']) ? $_POST['target'] : '',
                    'url' => isset($_POST['url']) ? $_POST['url'] : '',
                    'detail' => isset($_POST['detail']) ? $_POST['detail'] : '',
                    'userIP' => $_SERVER['REMOTE_ADDR'],
                    'userInfo' => json_encode($this->user),
                    'serverInfo' => json_encode($_SERVER)
        );

        try {
            $this->db->insert ('log_button_clicks', $data);
        } catch (Exception $e) {
            die($e->getMessage());
            error_log($e->getMessage());
            return false;
        }
        return true;
    }
 
    public function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function emailListSignup($output=1) {
        if(!$this->validateEmail($_POST['email'])){
            $error[] = 'A valid email is required';
   
            if($output == 1){
                echo json_encode(array('error' => $error));
            }

            return false;
        }

        if(empty($error)){
            if($this->checkIfEmailIsOnList($_POST['email'])){
                if($output == 1) {
                    echo json_encode(array('error' => 'You are already on the list'));
                }
                return false;
            }

            $msg = 'Thanks for joining the mailing list!';

            $data = Array ('email' => $_POST['email'],
                        'userInfo' => json_encode($this->user)
            );

            try {
                $this->db->insert ('email_list_signups', $data);
            } catch (Exception $e) {
                die($e->getMessage());
                error_log($e->getMessage());
                return false;
            }

            if($output == 1){
                echo json_encode(array('success' => $msg));
                return true;
            }
        }

        return false;
    }

    public function checkIfEmailIsOnList($email): bool {
        $results = $this->db->where ('email', $_POST['email'])->getOne('email_list_signups');
        if($results){
            return true;
        }
        return false;
    }
}