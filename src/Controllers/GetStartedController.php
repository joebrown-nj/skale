<?php

namespace App\Controllers;

use App\Core\Contracts\EmailServiceInterface;
use App\Core\Contracts\ViewInterface;
use App\Models\GetStartedModel;

class GetStartedController
{
    private EmailServiceInterface $emailModel;
    private GetStartedModel $getStartedModel;
    private ViewInterface $view;

    public function __construct(EmailServiceInterface $emailModel, GetStartedModel $getStartedModel, ViewInterface $view) {
        $this->emailModel = $emailModel;
        $this->getStartedModel = $getStartedModel;
        $this->view = $view;
    }

    public function postGetStarted()
    {
        $result = $this->getStartedModel->checkForm($_POST);

        if(!empty($result)) {
            echo json_encode(array('error' => $result));
        } else {
            if($this->getStartedModel->processGetStartedForm($_POST)) {
                $msg = '<p class="mb-0">Thanks we will be in touch soon, '.$_ENV['SITE_NAME'].'</p>';
                $success[] = $msg;

                $emailMsg = $this->emailModel->emailTemplate('<p>Hi '.$_POST['name'].',</p>'.$msg, $_POST['email']);
                $this->emailModel->sendEmail($_POST['email'], 'Thanks for filling out the contact form', $emailMsg, $_POST['name']);

                $msg = 'Form data: <br>';
                $msg .= json_encode($_POST);
                $msg .= '<br><br>Server data: <br>';
                $msg .= json_encode($_SERVER);
                $msg .= '<br><br>User data: <br>';
                $msg .= json_encode($this->view->getUser());
                $emailMsg = $this->emailModel->emailTemplate($msg, $_POST['email']);
                $this->emailModel->sendEmail($_ENV['CONTACT_FORM_MY_EMAIL'], 'Someone filled out the contact form', $emailMsg);

                echo json_encode(array('success' => $success));
            }
        }
    }
}
