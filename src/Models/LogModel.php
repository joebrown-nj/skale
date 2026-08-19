final <?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Entities\LogButtonClicksEntity;
use Doctrine\ORM\EntityManager;
use Throwable;

class LogModel
{
    private EntityManager $entityManager;

    public function logButtonClick(array $data): bool
    {
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
        } catch (Throwable $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }
}
