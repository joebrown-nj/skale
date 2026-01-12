<?php

namespace App\Models;
use MysqliDb;

class NavModel
{
    public function getNav($menuLocation, $parent=0): Array {
        $returnVal = array();

        $db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

        $db->where('parentId', $parent); 

        if($menuLocation){
            $db->where('menuLocation', $menuLocation);
        }

        $db->orderBy('listingOrder','asc');
        $nav = $db->get('menu');

        foreach($nav as $v) {
            if($v['parentId'] == 0){
                $v['children'] = $this->getNav($menuLocation, $v['id']);
            }
            $returnVal[] = $v;
        }
 
        return $returnVal;
    }
}