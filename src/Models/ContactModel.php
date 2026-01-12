<?php

namespace App\Models;

use App\Models\EmailModel;
use App\Controllers\LogController;
use MysqliDb;

class ContactModel
{
    private $db;

    public function __construct() {
        $this->db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    }

    public function checkContactForm($p): Array {
        $error = array();

        if(empty($p['name'])){
            $error[] = 'Name is required';
        }

        if(empty($p['email']) || !filter_var($p['email'], FILTER_VALIDATE_EMAIL)){
            $error[] = 'Email is required';
        }

        if(empty($p['comment'])){
            $error[] = 'Comment is required';
        }

        return $error;
    }

    public function processContactForm($p): Array {
        $msg = '<p>Thanks for being awesome!</p>';
        $msg .= '<p>We have received your message and would like to thank you for writing to us. If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members.</p>';
        $msg .= '<p>Otherwise, we will reply by email as soon as possible.</p>';
        $msg .= '<p>Talk to you soon, '.$_ENV['SITE_NAME'].'</p>';

        $success[] = $msg;

        $data = Array (
            'name' => $p['name'],
            'email' => $p['email'],
            'phone' => $p['phone'],
            'subject' => 'subject',
            'message' => $p['comment'],
            'interestedIn' => json_encode($p['interests'])
        );

        $this->db->insert ('contact', $data);

        if($this->db->getLastError()){
            echo $this->db->getLastError();
            return array('There was an error saving your contact form. Please try again later. '.$this->db->getLastError());
        }

        $emailModel = new EmailModel();
        $emailMsg = $emailModel->emailTemplate('<p>Hi '.$p['name'].',</p>'.$msg, $p['email']);
        $emailModel->sendEmail($p['email'], 'Thanks for filling out the contact form', $emailMsg, $p['name']);

        $logController = new LogController();
        if(isset($p['subscribe']) && $p['subscribe'] == 1){
            $logController->emailListSignup(0);
        }

        $msg = 'Form data: <br>';
        $msg .= json_encode($_POST);
        $msg .= '<br><br>Server data: <br>';
        $msg .= json_encode($_SERVER);
        $msg .= '<br><br>User data: <br>';
        $msg .= json_encode($logController->getUser());
        $emailMsg = $emailModel->emailTemplate($msg, $p['email']);
        $emailModel->sendEmail($_ENV['CONTACT_FORM_MY_EMAIL'], 'Someone filled out the contact form', $emailMsg);

        return $success;
    }
}