<?php

namespace App\Models;

use Doctrine\ORM\EntityManager;
use App\Models\Entities\MenuEntity;

class NavModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getNav($menuLocation, $parent=0): Array {
        $returnVal = array();

        $repository = $this->entityManager->getRepository(MenuEntity::class);

        $query = $repository->createQueryBuilder('m')
            ->where('m.menuLocation = :menuLocation and m.parentId = :parentId')
            ->setParameter('menuLocation', $menuLocation)
            // ->where('m.parentId = :parentId')
            ->setParameter('parentId', $parent)
            ->orderBy('m.listingOrder', 'ASC')
            ->getQuery();

        $nav = $query->getArrayResult();

        foreach($nav as $v) {
            $v['children'] = $v['parentId'] == 0 ? $this->getNav($menuLocation, $v['id']) : '';
            $returnVal[] = $v;
        }

        return $returnVal;
    }
}