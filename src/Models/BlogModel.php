<?php

declare(strict_types=1);

namespace App\Models;

use Doctrine\ORM\Tools\Pagination\Paginator;
use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use Doctrine\ORM\EntityManager;
use App\Models\Entities\BlogEntity;

class BlogModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllBlogs(?string $category = null, ?int $limit = 10): ?array
    {
        try {
            $repository = $this->entityManager->getRepository(BlogEntity::class);
            $queryBuilder = $repository->createQueryBuilder('b')
                ->orderBy('b.datePosted', 'DESC')
                ->setMaxResults($limit);

            if ($category !== null && $category !== '') {
                $queryBuilder
                    ->andWhere('b.category = :category')
                    ->setParameter('category', $category);
            }

            $query = $queryBuilder->getQuery();
            $returnVal = $query->getResult();
        } catch (\Throwable $e) {
            error_log($e->getMessage());
            return [];
        }
        return $returnVal;
    }

    public function getBlogArchive(int $start = 0, int $limit = 10, ?string $category = null): ?array
    {
        $repository = $this->entityManager->getRepository(BlogEntity::class);
        $queryBuilder = $repository->createQueryBuilder('b')
            ->orderBy('b.datePosted', 'DESC')
            ->setFirstResult($start)
            ->setMaxResults($limit);

        if ($category !== null && $category !== '') {
            $queryBuilder
                ->andWhere('b.category = :category')
                ->setParameter('category', $category);
        }

        $query = $queryBuilder->getQuery();
        $returnVal = $query->getResult();

        return $returnVal;
    }

    public function getBlogTotalCount(?string $category = null): int
    {
        $repository = $this->entityManager->getRepository(BlogEntity::class)->createQueryBuilder('b')
            ->select('count(b.id)');

        if ($category !== null && $category !== '') {
            $repository
                ->andWhere('b.category = :category')
                ->setParameter('category', $category);
        }

        $count = $repository->getQuery()->getSingleScalarResult();
        return $count;
    }

    public function getBlogByUrl($url = ''): ?BlogEntity
    {
        $url = explode('/', rtrim($url, '/'));
        $returnVal = $this->entityManager->getRepository(BlogEntity::class)->findOneBy(['url' => $url]);
        return $returnVal;
    }

    public function getFeaturedBlog(): ?BlogEntity
    {
        $repository = $this->entityManager->getRepository(BlogEntity::class);
        $query = $repository->createQueryBuilder('b')->where('b.featured = 1')
            ->orderBy('b.datePosted', 'DESC')->setMaxResults(1)->getQuery();
        $returnVal = $query->getOneOrNullResult();

        return $returnVal;
    }

    public function getBlogCategories(): array
    {
        $repository = $this->entityManager->getRepository(BlogEntity::class);
        $query = $repository->createQueryBuilder('b')
            ->select('DISTINCT b.category')
            ->where('b.category IS NOT NULL')
            ->andWhere('b.category != :emptyCategory')
            ->setParameter('emptyCategory', '')
            ->orderBy('b.category', 'ASC')
            ->getQuery();
        $returnVal = $query->getResult();

        return array_map(function ($item) {
            return $item['category'];
        }, $returnVal);
    }
}
