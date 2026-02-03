<?php

namespace App\Models;

use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use App\Entities\BlogEntity;
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
        $query = $repository->createQueryBuilder('hp')->orderBy('hp.impressions', 'ASC')->setMaxResults(1)->getQuery();
        $returnVal = $query->getOneOrNullResult();
        return $returnVal;
    }

    public function getWhyChooseUsContent(): array
    {
        return array(
            array(
                'title' => 'All-in-One Expertise',
                'description' => 'A single, reliable partner for websites, IT, software, marketing, and consulting services, simplifying your operations and improving efficiency.'
            ),
            array(
                'title' => 'Custom-Built Solutions',
                'description' => 'Every strategy, system, and campaign is designed around your unique business goals, challenges, and growth plans.'
            ),
            array(
                'title' => 'Scalable Technology & Marketing',
                'description' => 'Future-ready systems and marketing frameworks that grow with your business, ensuring long-term stability and performance.'
            ),
            array(
                'title' => 'Results-Focused Execution',
                'description' => 'Data-driven decisions and proven methods focused on increasing visibility, engagement, and return on investment.'
            ),
            array(
                'title' => 'Dedicated Ongoing Support',
                'description' => 'Proactive maintenance, expert consulting, and continuous optimization to keep your business running smoothly.'
            )
        );
    }
}