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
/*
 public function getWhyChooseUsContent(): array
 {
 return array(
 array(
 'title' => 'All-in-One Expertise',
 'description' => 'A single, reliable partner for websites, IT, software, marketing, and consulting solutions, simplifying your operations and improving efficiency.'
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
*/
}
