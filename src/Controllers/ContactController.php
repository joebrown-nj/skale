<?php

namespace App\Controllers;

use App\Controller;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function index()
    {
        $this->render('contact');
    }

    public function submit()
    {
        $contactModel = new ContactModel();
        $contactResult = $contactModel->checkContactForm($_POST);

        if(!empty($contactResult)) {
            echo json_encode(array('error' => $contactResult));
        } else {
            $success = $contactModel->processContactForm($_POST);
            echo json_encode(array('success' => $success));
        }
        // $res = $contactModel->checkContactForm();
        // $view = $this->getP1() == '' ? 'home' : $this->getP1();
        // $this->render($view, array('error' => $error, 'success' => $success));
    }
}