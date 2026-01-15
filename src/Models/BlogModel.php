<?php

namespace App\Models;

use MysqliDb;

class BlogModel
{
    private $db;

    public function __construct() {
        $this->db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    }

    public function getAllBlogs() : Array | NULL  {
        $returnVal = $this->db->where('featured', 0)->orderBy('datePosted','desc')->get('blog', 10);
        return $returnVal;
    }

    public function getBlogByUrl($url='') : Array | NULL {
        $url = explode('/', rtrim($url, '/'));
        $returnVal = $this->db->where('datePosted', $url[1])->where('url', $url[2])->getOne('blog');
        echo $this->db->getLastQuery();
        die;
        return $returnVal;
    }

    public function getFeaturedBlog() : Array | NULL {
        $returnVal = $this->db->where('featured', 1)->orderBy('datePosted', 'desc')->getOne('blog');
        return $returnVal;
    }
}