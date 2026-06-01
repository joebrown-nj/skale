<?php
declare(strict_types=1);

namespace App\Models;

use Doctrine\ORM\EntityManager;
use App\Models\Entities\MenuEntity;

class PageContentModel
{
 private EntityManager $entityManager;

 public function __construct(EntityManager $entityManager) {
 $this->entityManager = $entityManager;
 }

 public function getPageContentByUrl(string $url=''): array | bool
 {
 $url = trim($url, '/');

 $result = $this->entityManager->createQueryBuilder()
 ->select('m', 'p')
 ->from(MenuEntity::class, 'm')
 ->leftJoin('m.pageContent', 'p')
 ->where('m.url = :url')
 ->andWhere('m.active = :active')
 ->setParameter('url', $url)
 ->setParameter('active', true)
 ->getQuery()
 ->getOneOrNullResult();

 if ($result === null) {
 return false;
 }

 return [
 'menu' => $result,
 'content' => $result->getPageContent(),
 ];
 }
}
