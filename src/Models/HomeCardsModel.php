final <?php

namespace App\Models;

use Doctrine\ORM\EntityManager;
use App\Models\Entities\HomeCardEntity;

class HomeCardsModel
{
    private EntityManager $entityManager;

    public function getHomeCards(): ?array
    {
        $repository = $this->entityManager->getRepository(HomeCardEntity::class);
        $query = $repository->createQueryBuilder('hc')
            ->orderBy('hc.id', 'ASC')
            ->getQuery();
        $returnVal = $query->getResult();
        return $returnVal;
    }
}
