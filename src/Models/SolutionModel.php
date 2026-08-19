<?php

namespace App\Models;

use Doctrine\ORM\EntityManager;
use App\Models\Entities\SolutionsEntity;
use App\Models\Entities\ServicePageEntity;

class SolutionModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllSolutions(bool $activeOnly = true): ?array
    {
        $repository = $this->entityManager->getRepository(SolutionsEntity::class);
        $query = $repository->createQueryBuilder('s');
        if ($activeOnly) {
            $query->where('s.active = 1');
        }
        $query->orderBy('s.listingOrder', 'ASC');

        $results = $query->getQuery()->getResult();
        return $results;
    }

    public function getSolutionByUrl($url = ''): ?SolutionsEntity
    {
        $url = $_ENV['URL_SERVICES_SOLUTIONS'] . '/' . rtrim($url, '/');
        $returnVal = $this->entityManager->getRepository(SolutionsEntity::class)->findOneBy(['url' => $url]);
        return $returnVal;
    }
}
