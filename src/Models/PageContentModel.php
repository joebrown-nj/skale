<?php

namespace App\Models;

use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use App\Entities\BlogEntity;
use Doctrine\ORM\EntityManager;
use App\Models\Entities\MenuEntity;
use App\Models\Entities\PageContentEntity;

class PageContentModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getPageContentByUrl(string $url=''): Array | bool
    {
        // if(substr($url, 0, 1) == '/') { $url = substr($url, 1); }
        // $menuQuery = $this->entityManager->getRepository(MenuEntity::class)->findOneBy(['url' => $url]);

        // if(empty($menuQuery)) return false;
        // $returnVal = $this->entityManager->getRepository(PageContentEntity::class)->findOneBy(['id' => $menuQuery->pageContentId]);

        // return array('menu' => $menuQuery, 'pageContent' => $returnVal);

 
        // $qb = $this->entityManager->createQueryBuilder('m');

        // // $qb->select('m.id, m.title, m.url, m.class, m.pageContentId, m.parentId, m.listingOrder, m.menuLocation, m.active, p.id as pageContentId, p.title as pageTitle, p.content, p.metaTitle, p.metaDescription, p.metaKeywords, p.dateUpdated')
        // // ->from('menu', 'm')
        // // ->innerJoin('m', 'page_content', 'p', 'm.pageContentId = p.id')
        // // ->where('m.url = ?')
        // // ->setParameter(0, $url);

        $repository = $this->entityManager->getRepository(MenuEntity::class);
        $query = $repository->createQueryBuilder('m')
        ->select('m.id, m.title, m.url, m.class, m.pageContentId, m.parentId, m.listingOrder, m.menuLocation, m.active, p.id as pageContentId, p.title as pageTitle, p.content, p.metaTitle, p.metaDescription, p.metaKeywords, p.dateUpdated')
        ->leftJoin(PageContentEntity::class, 'p', 'WITH', 'm.pageContentId = p.id')
        ->where('m.url = :url')
        ->setParameter('url', $url)
        ->setMaxResults(1);
 
        // echo $query->getQuery()->getSQL();
        // die;
        // echo '<pre>';
        // print_r($query->getQuery()->getArrayResult());
        // echo '</pre>';
        // die;

        // $d = (obj)$query->getQuery()->getOneOrNullResult();
        // print_r($d);die;
 
        return $query->getQuery()->getOneOrNullResult();
    }
}