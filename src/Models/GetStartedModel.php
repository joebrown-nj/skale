<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Entities\ContactEntity;
use Doctrine\ORM\EntityManager;
use Throwable;

class GetStartedModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function checkForm(array $data): array
    {
        $error = array();

        if (empty($data['name'])) {
            $error[] = 'Name is required';
        }

        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = 'Email is required';
        }

        if (empty($data['phone'])) {
            $error[] = 'Phone is required';
        }

        return $error;
    }

    public function processGetStartedForm(array $data): bool
    {
        try {
            $contact = $this->buildContactEntity($data);
            $this->entityManager->persist($contact);
            $this->entityManager->flush();
            return true;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    private function buildContactEntity(array $data): ContactEntity
    {
        $contact = new ContactEntity();
        $contact->setname($data['name']);
        $contact->setemail($data['email']);
        $contact->setphone($data['phone']);
        $contact->setmessage($data['goals']);
        $contact->setinterestedIn(json_encode([]));

        return $contact;
    }
}
