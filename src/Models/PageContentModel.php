<?php

declare(strict_types=1);

namespace App\Models;

use Doctrine\ORM\EntityManager;
use App\Models\Entities\MenuEntity;

class PageContentModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPageContentByUrl(string $url = ''): array|false
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

    /**
     * Return menu-backed pages below a URL prefix.
     *
     * Menu remains the canonical source for URLs, visibility, and ordering while
     * page_content owns the page body and metadata.
     *
     * @param ?string $parentUrl Restrict results to direct children of this menu URL.
     * @param ?int $limit Maximum results to return.
     *
     * @return MenuEntity[]
     */
    public function getPagesByUrlPrefix(
        string $urlPrefix,
        bool $activeOnly = true,
        ?string $parentUrl = null,
        ?int $limit = null,
    ): array {
        $urlPrefix = trim($urlPrefix, '/');

        $query = $this->entityManager->createQueryBuilder()
            ->select('m', 'p')
            ->from(MenuEntity::class, 'm')
            ->innerJoin('m.pageContent', 'p')
            ->where('m.url LIKE :urlPrefix')
            ->setParameter('urlPrefix', $urlPrefix . '/%')
            ->orderBy('m.listingOrder', 'ASC');

        if ($activeOnly) {
            $query
                ->andWhere('m.active = :active')
                ->setParameter('active', true);
        }

        if ($parentUrl !== null) {
            $parentUrl = trim($parentUrl, '/');
            $parentIdQuery = $this->entityManager->createQueryBuilder()
                ->select('parent.id')
                ->from(MenuEntity::class, 'parent')
                ->where('parent.url = :parentUrl');

            $query
                ->andWhere('m.parentId = (' . $parentIdQuery->getDQL() . ')')
                ->setParameter('parentUrl', $parentUrl);
        }

        if ($limit !== null) {
            $query->setMaxResults(max(0, $limit));
        }

        return $query->getQuery()->getResult();
    }
}
