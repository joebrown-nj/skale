<?php

namespace App\Models;
use MysqliDb;

class HomePageModel
{
    private $db;

    public function __construct() {
        $this->db = new MysqliDb ($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
    }

   public function getHeroContent()
    {
        $this->db->orderBy('impressions', 'asc');
        $r = $this->db->getOne('home_page');

        $data = Array ('impressions' => $r['impressions'] + 1);
        $this->db->where ('id', $r['id']);
        if (!$this->db->update ('home_page', $data)) die('update failed: ' . $db->getLastError());

        return $r;
    }

    public function getWhyChooseUsContent()
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