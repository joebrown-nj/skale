<?php

namespace App\Models;

use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use Doctrine\ORM\EntityManager;
// use App\Models\EmailModel;
// use App\Controllers\LogController;
use App\Models\Entities\ContactEntity;

class GetStartedModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function checkForm($data): Array {
        $error = array();

        if(empty($data['name'])){
            $error[] = 'Name is required';
        }

        if(empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $error[] = 'Email is required';
        }

        if(empty($data['phone'])){
            $error[] = 'Phone is required';
        }

        return $error;
    }

    public function processGetStartedForm($data): bool {
        try {
            $contact = new ContactEntity();
            $contact->setname($data['name']);
            $contact->setemail($data['email']);
            $contact->setphone($data['phone']);
            $contact->setmessage('Get started form submission');

            $this->entityManager->persist($contact);
            $this->entityManager->flush();
            return true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo $e->getMessage();
            return false;
        }
    }
}