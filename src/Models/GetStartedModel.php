<?php
declare(strict_types=1);

namespace App\Models;

use Doctrine\ORM\EntityManager;

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
}
