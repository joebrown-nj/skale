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

    public function getPageContentByUrl(string $url=''): Array | NULL
    {
        $menuQuery = $this->entityManager->getRepository(MenuEntity::class)->findOneBy(['url' => $url]);
        // echo $url;
        // print_r($menuQuery);
        // die;
        $returnVal = $this->entityManager->getRepository(PageContentEntity::class)->findOneBy(['id' => $menuQuery->pageContentId]);
        // print_r($returnVal);
        // die;
        return array('menu' => $menuQuery, 'pageContent' => $returnVal);
    }
}