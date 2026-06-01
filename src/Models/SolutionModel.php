<?php

namespace App\Models;

use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use Doctrine\ORM\EntityManager;
use App\Models\Entities\SolutionsEntity;

class SolutionModel
{
 private EntityManager $entityManager;

 public function __construct(EntityManager $entityManager) {
 $this->entityManager = $entityManager;
 }

 public function getAllSolutions(bool $activeOnly = true): Array | NULL {
 $repository = $this->entityManager->getRepository(SolutionsEntity::class);
 $query = $repository->createQueryBuilder('s');
 if ($activeOnly) {
 $query->where('s.active = 1');
 }
 $query->orderBy('s.listingOrder', 'ASC');

 $results = $query->getQuery()->getResult();
 return $results;
 }

 public function getSolutionByUrl($url=''): SolutionsEntity | NULL {
 $url = $_ENV['URL_SERVICES_SOLUTIONS'].'/'.rtrim($url, '/');
 $returnVal = $this->entityManager->getRepository(SolutionsEntity::class)->findOneBy(['url' => $url]);
 return $returnVal;
 }
}
