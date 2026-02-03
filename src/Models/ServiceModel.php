<?php

namespace App\Models;

use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use Doctrine\ORM\EntityManager;
use App\Models\Entities\ServicesEntity;

class ServiceModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    // public function showIcon($icon, $type): string | null {
    //     if(empty($icon) || empty($type)) { die('must have type and icon'); }

    //     switch($type) {
    //         case 'bootstrap':
    //             return '<svg class="bi text-body-secondary flex-shrink-0 me-3" width="1.75em" height="1.75em" ><use xlink:href="'.$_ENV['SITE_URL'].'images/bootstrap-icons.svg#'.$icon.'"></use></svg>';

    //         case 'fontawesome':
    //             return '<i class="'.$icon.' bi text-body-secondary flex-shrink-0 me-1 mt-1" width="1.75em" height="1.75em"></i>';

    //         default:
    //             die('invlid icon type: '.$type);
    //     }
    // }

    public function getAllServices(): Array | NULL {
        // $this->entityManager->orderBy('listingOrder','asc');
        // $sl = $this->entityManager->get('services');
        // $interestArray = isset($_GET['interests']) ? explode(',', $_GET['interests']) : array();
        // $serviceList = array();
        // foreach($sl as $v) {
        //     $v['icon'] = $this->showIcon($v['iconType'] == 'bootstrap' ? $v['iconBootstrap'] : $v['iconFontAwesome'], $v['iconType']);
        //     $v['slug'] = str_replace('services/', '', $v['url']);
        //     $v['selected'] = isset($_GET['interests']) && in_array($v['slug'], $interestArray) ? true : false;
        //     $serviceList[] = $v;
        // }
        // return $serviceList;

        $repository = $this->entityManager->getRepository(ServicesEntity::class);
        $query = $repository->createQueryBuilder('s')->orderBy('s.listingOrder', 'ASC')->getQuery();
        $results = $query->getResult();

        // foreach($result as $v) {
        //     // $v['icon'] = $this->showIcon($v['iconType'] == 'bootstrap' ? $v['iconBootstrap'] : $v['iconFontAwesome'], $v['iconType']);
        //     // $v['slug'] = str_replace('services/', '', $v['url']);
        //     $serviceList[] = $v;
        // }

        return $results;
    }

    public function getServiceByUrl($url=''): ServicesEntity | NULL {
        $url = 'services/'.rtrim($url, '/');
        $returnVal = $this->entityManager->getRepository(ServicesEntity::class)->findOneBy(['url' => $url]);
        return $returnVal;
    }
}