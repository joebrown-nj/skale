<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Core\View;
use App\Core\LoadSessionData;
use App\Models\PageContentModel;
use App\Models\EmailModel;

class ContactController
{
    private EmailModel $emailModel;
    private PageContentModel $pageContentModel;
    private ContactModel $contactModel;
    private View $view;
    private LoadSessionData $loadSessionData;

    public function __construct(PageContentModel $pageContentModel, LoadSessionData $loadSessionData, ContactModel $contactModel, EmailModel $emailModel)
    {
        $this->emailModel = $emailModel;
        $this->pageContentModel = $pageContentModel;
        $this->contactModel = $contactModel;
        $this->view = new View();
        $this->loadSessionData = $loadSessionData;
    }

    public function index()
    {
        $this->view->render('contact', array(
            'pageContent' => $this->pageContentModel->getPageContentByUrl($this->view->getUri())
        ));
    }

    public function submit()
    {
        $contactResult = $this->contactModel->checkContactForm($_POST);

        if(!empty($contactResult)) {
            echo json_encode(array('error' => $contactResult));
        } else {
            if($this->contactModel->processContactForm($_POST)) {
                $msg = '<p>Thanks for being awesome!</p>';
                $msg .= '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members.</p>';
                $msg .= '<p>Otherwise, we will reply by email as soon as possible.</p>';
                $msg .= '<p>Talk to you soon, '.$_ENV['SITE_NAME'].'</p>';

                $success[] = $msg;

                $emailMsg = $this->emailModel->emailTemplate('<p>Hi '.$_POST['name'].',</p>'.$msg, $_POST['email']);
                $this->emailModel->sendEmail($_POST['email'], 'Thanks for filling out the contact form', $emailMsg, $_POST['name']);

                if(isset($_POST['subscribe']) && $_POST['subscribe'] == 1){
                    $emailListResult = $this->emailModel->emailListSignup(Array ('email' => $_POST['email'], 'userInfo' => json_encode($this->view->getUser())), $this->view->getUser());
                }

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