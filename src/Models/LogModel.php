<?php

namespace App\Models;

use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use Doctrine\ORM\EntityManager;
use App\Models\Entities\LogButtonClicksEntity;

class LogModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function logButtonClick(array $data) : bool {
        try {
            $post = new LogButtonClicksEntity();
            $post->settarget($data['target']);
            $post->seturl($data['url']);
            $post->setdetail($data['detail']);
            $post->setuserIP($data['userIP']);
            $post->setuserInfo($data['userInfo']);
            $post->setserverInfo($data['serverInfo']);

            $this->entityManager->persist($post);
            $this->entityManager->flush();
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo $e->getMessage();
            return false;
        }
        return true;
    }
}