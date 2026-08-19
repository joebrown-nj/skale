final <?php

namespace App\Models;

use Doctrine\ORM\EntityManager;
use App\Models\Entities\MenuEntity;

class NavModel
{
    private EntityManager $entityManager;

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

    public function getAllNav(): array
    {
        $repository = $this->entityManager->getRepository(MenuEntity::class);
        $navItems = $repository->createQueryBuilder('m')->getQuery()->getArrayResult();
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
