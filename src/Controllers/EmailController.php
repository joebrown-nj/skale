<?php

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;

class EmailController
{
    private EmailServiceInterface $emailModel;
    private ViewInterface $view;

    public function __construct(EmailServiceInterface $emailModel, ViewInterface $view)
    {
        $this->emailModel = $emailModel;
        $this->view = $view;
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

        return json_encode(array('error' => 'Unable to process email signup'));
    }
}
