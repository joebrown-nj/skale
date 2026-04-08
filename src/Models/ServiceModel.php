<?php

namespace App\Models;

use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use Doctrine\ORM\EntityManager;
use App\Models\Entities\ServicesEntity;

class ServiceModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getAllServices(): Array | NULL {
        $repository = $this->entityManager->getRepository(ServicesEntity::class);
        $query = $repository->createQueryBuilder('s')->where('s.active = 1')->orderBy('s.listingOrder', 'ASC')->getQuery();
        $results = $query->getResult();
        return $results;
    }

    public function getServiceByUrl($url=''): ServicesEntity | NULL {
        $url = 'services/'.rtrim($url, '/');
        $returnVal = $this->entityManager->getRepository(ServicesEntity::class)->findOneBy(['url' => $url]);
        return $returnVal;
    }
}