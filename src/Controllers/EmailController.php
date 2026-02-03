<?php

namespace App\Controllers;

use App\Models\EmailModel;
use App\Core\View;

class EmailController
{
    private EmailModel $emailModel;
    private View $view;

    public function __construct(EmailModel $emailModel)
    {
        $this->emailModel = $emailModel;
        $this->view = new View();
    }

    public function signUp(): string
    {
        $email = $_POST['email'];
        if(!$this->emailModel->validateEmail($email)){
            $error[] = 'A valid email is required';
            return json_encode(array('error' => $error));
        }

        if(empty($error)){
            if($this->emailModel->checkIfEmailIsOnList($email)){
                return json_encode(array('error' => 'You are already on the list'));
            } else {
                $data = Array ('email' => $email, 'userInfo' => json_encode($this->view->getUser()));
                if($this->emailModel->processEmailListSignup($data)){
                    return json_encode(array('success' => 'Thanks for joining the mailing list!'));
                }
            }
        }
    }
}