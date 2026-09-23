<?php

namespace App\Models;

use App\Models\Entities\PortfolioEntity;
use App\Models\Entities\TestimonialEntity;
use Doctrine\ORM\EntityManager;

class PortfolioModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPortfolioItems(): array
    {
        $repository = $this->entityManager->getRepository(PortfolioEntity::class);
        $query = $repository->createQueryBuilder('p')->orderBy('p.id', 'DESC')->getQuery();
        $portfolioItems = $query->getResult();
        return $portfolioItems;
    }

    public function getPortfolioItemBySlug(string $slug): ?PortfolioEntity
    {
        $repository = $this->entityManager->getRepository(PortfolioEntity::class);
        $query = $repository->createQueryBuilder('p')
            ->where('p.url = :slug')
            ->setParameter('slug', $slug)
            ->getQuery();
        $portfolioItem = $query->getOneOrNullResult();
        return $portfolioItem;
    }

    /** @return TestimonialEntity[] */
    public function getTestimonialsForPortfolioItem(int $portfolioItemId): array
    {
        return $this->entityManager
            ->getRepository(TestimonialEntity::class)
            ->createQueryBuilder('testimonial')
            ->innerJoin('testimonial.projects', 'project')
            ->where('project.id = :portfolioItemId')
            ->andWhere('testimonial.active = :active')
            ->setParameter('portfolioItemId', $portfolioItemId)
            ->setParameter('active', true)
            ->orderBy('testimonial.date', 'DESC')
            ->addOrderBy('testimonial.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
