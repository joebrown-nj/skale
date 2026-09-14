<?php

namespace App\Models;

use Doctrine\ORM\EntityManager;
use App\Models\Entities\MenuEntity;

class NavModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        // $this->printNavTree();die;
    }

    public function getNav(string $menuLocation, int $parent = 0): array
    {
        $repository = $this->entityManager->getRepository(MenuEntity::class);

        $navItems = $repository->createQueryBuilder('m')
            ->where('m.menuLocation = :menuLocation and m.active = :active')
            ->setParameter('menuLocation', $menuLocation)
            ->setParameter('active', 1)
            ->orderBy('m.parentId', 'ASC')
            ->addOrderBy('m.listingOrder', 'ASC')
            ->getQuery()
            ->getArrayResult();

        $itemsByParent = [];

        foreach ($navItems as $item) {
            $itemsByParent[$item['parentId']][] = $item;
        }

        return $this->buildNavTree((int) $parent, $itemsByParent);
    }

    public function printNavTree(): void
    {
        $repository = $this->entityManager->getRepository(MenuEntity::class);
        $sub = $repository->createQueryBuilder('m')
        ->where('m.parentId = :parentId and m.active = :active')
        ->setParameter('parentId', 2)
        ->setParameter('active', 1);

        $r = $repository->createQueryBuilder('m')
            ->select('m.id, m.parentId, m.title, m.url')
            ->where('m.parentId IN (:subIds) OR m.parentId = :parentId')
            ->andWhere('m.active = :active')
            ->setParameter('active', 1)
            ->setParameter('subIds', $sub->getQuery()->getResult())
            ->setParameter('parentId', 2)
            ->orderBy('m.parentId', 'ASC')
            ->addOrderBy('m.listingOrder', 'ASC')
            ->getQuery()
            ->getArrayResult();

        foreach ($r as $item) {
            $itemsByParent[$item['parentId']][] = $item;
            $parents[$item['id']] = $item;
        }

        foreach ($itemsByParent as $parentId => $items) {
            if(!$parents[$parentId]) continue;
            echo "<b>title: {$parents[$parentId]['title']} url: {$parents[$parentId]['url']}</b><br>";
            echo "<ul>";
            foreach ($items as $item) {
                echo "<li>title: {$item['title']} url: {$item['url']}</li>";
            }
            echo "</ul>";
            echo "<hr>";
        }
        die;
    }

    public function getAllNav(): array
    {
        $repository = $this->entityManager->getRepository(MenuEntity::class);

        $navItems = $repository->createQueryBuilder('m')
                ->where('m.active = :active')
                ->setParameter('active', true)
                ->getQuery()
                ->getArrayResult();
        return $navItems;
    }

    private function buildNavTree(int $parentId, array $itemsByParent): array
    {
        $navItems = $itemsByParent[$parentId] ?? [];
        $tree = [];

        foreach ($navItems as $item) {
            $children = $this->buildNavTree((int) $item['id'], $itemsByParent);
            $item['children'] = $children === [] ? '' : $children;
            $tree[] = $item;
        }

        return $tree;
    }
}
