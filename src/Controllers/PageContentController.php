<?php

namespace App\Controllers;

use App\Controller;
use MysqliDb;

class PageContentController extends Controller
{
    public function getPageContent($url=''): Array | NULL
    {
        $url = !empty($url)
            ? $url 
            : (isset($_SERVER['PATH_INFO'])
                ? substr($_SERVER['PATH_INFO'], 1, strlen($_SERVER['PATH_INFO'])) 
                : '');

        $url = rtrim($url, '/');

        $db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

        $db->join("menu m", "p.id=m.pageContentId", "LEFT");
        $db->where("m.url", $url);
        $returnVal = $db->getOne("page_content p", "p.*, m.title as menuTitle, m.url");
// echo $db->getLastQuery();
        return $returnVal;
    }
}