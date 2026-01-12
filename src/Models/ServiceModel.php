<?php

namespace App\Models;

use MysqliDb;

class ServiceModel
{
    private $db;

    public function __construct() {
        $this->db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    }

    public function showIcon($icon, $type): string | null {
        if(empty($icon) || empty($type)) { die('must have type and icon'); }

        switch($type) {
            case 'bootstrap':
                return '<svg class="bi text-body-secondary flex-shrink-0 me-3" width="1.75em" height="1.75em" ><use xlink:href="'.$_ENV['SITE_URL'].'images/bootstrap-icons.svg#'.$icon.'"></use></svg>';

            case 'fontawesome':
                return '<i class="'.$icon.' bi text-body-secondary flex-shrink-0 me-1 mt-1" width="1.75em" height="1.75em"></i>';

            default:
                die('invlid icon type: '.$type);
        }
    }

    public function getAllServices(): Array | NULL {
        $this->db->orderBy('listingOrder','asc');
        $sl = $this->db->get('services');
        $interestArray = isset($_GET['interests']) ? explode(',', $_GET['interests']) : array();
        $serviceList = array();
        foreach($sl as $v) {
            $v['icon'] = $this->showIcon($v['iconType'] == 'bootstrap' ? $v['iconBootstrap'] : $v['iconFontAwesome'], $v['iconType']);
            $v['slug'] = str_replace('services/', '', $v['url']);
            $v['selected'] = isset($_GET['interests']) && in_array($v['slug'], $interestArray) ? true : false;
            $serviceList[] = $v;
        }
        return $serviceList;
    }

    public function getServiceByUrl($url=''): Array | NULL {
        $url = rtrim($url, '/');
        $this->db->where('url', $url);
        $returnVal = $this->db->getOne('services');
        return $returnVal;
    }
}