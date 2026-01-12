<?php

namespace App\Models;

use MysqliDb;

class BlogModel
{
    private $db;

    public function __construct() {
        $this->db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    }

    public function getAllBlogs() {
        $blogList = $this->db->orderBy('datePosted','desc')->get('blog');
        return $blogList;
    }

    public function getBlogByUrl($url='') {
        $url = explode('/', rtrim($url, '/'));
        $returnVal = $this->db->where('datePosted', $url[1])->where('url', $url[2])->getOne('blog');
        return $returnVal;
    }
}