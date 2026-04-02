<?php

namespace App\Models;

use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use Doctrine\ORM\EntityManager;
use App\Models\Entities\PortfolioEntity;

class PortfolioModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getPortfolioItems(): array
    {
        $repository = $this->entityManager->getRepository(PortfolioEntity::class);
        $query = $repository->createQueryBuilder('p')->orderBy('p.id', 'DESC')->getQuery();
        $portfolioItems = $query->getResult();
        return $portfolioItems;
    }
}