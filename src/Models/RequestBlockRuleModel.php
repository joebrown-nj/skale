final <?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Entities\RequestBlockRuleEntity;
use Doctrine\ORM\EntityManager;

class RequestBlockRuleModel
{


    /**
     * @return array<int, RequestBlockRuleEntity>
     */
    public function getActiveRules(): array
    {
        $repository = $this->entityManager->getRepository(RequestBlockRuleEntity::class);
        $queryBuilder = $repository->createQueryBuilder('r')
            ->where('r.active = 1')
            ->andWhere('r.expiresAt IS NULL OR r.expiresAt > :now')
            ->setParameter('now', new \DateTimeImmutable())
            ->orderBy('r.id', 'ASC');

        return $queryBuilder->getQuery()->getResult();
    }
}
