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
        if(substr($url, 0, 1) == '/') { $url = substr($url, 1); }
        $menuQuery = $this->entityManager->getRepository(MenuEntity::class)->findOneBy(['url' => $url]);
        if(empty($menuQuery)) return false;
        $returnVal = $this->entityManager->getRepository(PageContentEntity::class)->findOneBy(['id' => $menuQuery->pageContentId]);
        return array('menu' => $menuQuery, 'pageContent' => $returnVal);
    }
}