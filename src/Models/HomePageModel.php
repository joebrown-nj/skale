<?php

namespace App\Models;

use Doctrine\ORM\EntityManager;
use App\Models\Entities\HomePageEntity;

class HomePageModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getHeroContent(): HomePageEntity | NULL
    {
        $repository = $this->entityManager->getRepository(HomePageEntity::class);
        $query = $repository->createQueryBuilder('hp')
            ->where('hp.active = :active')->setParameter('active', true)
            ->orderBy('hp.impressions', 'ASC')
            ->setMaxResults(1)
            ->getQuery();
        $returnVal = $query->getOneOrNullResult();

        if ($returnVal) {
            $returnVal->impressions = $returnVal->impressions + 1;
            $this->entityManager->persist($returnVal);
            $this->entityManager->flush();
        }

        return $returnVal;
    }

    public function getTheResultsContent(): array
    {
        return array(
            'title' => 'What Happens When Your Systems Work Together',
            'results' => array(
                array(
                    'title' => 'Consistency',
                    'description' => 'A steady stream of high-quality leads that convert into customers.',
                    'icon' => 'fa-solid fa-calendar-days'
                ),
                array(
                    'title' => 'Automation',
                    'description' => 'Automate repetitive tasks and streamline operations for efficiency.',
                    'icon' => 'fa-solid fa-gears'
                ),
                array(
                    'title' => 'Conversions',
                    'description' => 'Optimize each stage of your sales funnel to maximize conversions.',
                    'icon' => 'fa-solid fa-filter-circle-dollar'
                ),
                array(
                    'title' => 'Visibility',
                    'description' => 'Gain actionable insights to drive strategic decisions and growth.',
                    'icon' => 'fa-solid fa-chart-column'
                )
            )
        );
    }

    public function getHowItWorksContent(): array
    {
        return array(
            'title' => 'A Systematic Approach to Scaling Your Business',
            'steps' => array(
                array(
                    'title' => 'Diagnose',
                    'description' => 'Identify inefficiencies, gaps, and missed opportunities.',
                    'icon' => 'fa-solid fa-stethoscope'
                ),
                array(
                    'title' => 'Architect',
                    'description' => 'Design a scalable system tailored to your business.',
                    'icon' => 'fa-solid fa-compass-drafting'
                ),
                array(
                    'title' => 'Build & Integrate',
                    'description' => 'Implement your infrastructure and systems.',
                    'icon' => 'fa-solid fa-hammer'
                ),
                array(
                    'title' => 'Optimize & Scale',
                    'description' => 'Refine, automate, and grow continuously.',
                    'icon' => 'fa-solid fa-scale-balanced'
                )
            )
        );
    }
}
