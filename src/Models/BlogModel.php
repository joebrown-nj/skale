<?php
declare(strict_types=1);

namespace App\Models;

use Doctrine\ORM\Tools\Pagination\Paginator;
use App\Core\ErrorHandler;
use App\Core\Db\DatabaseORM;
use Doctrine\ORM\EntityManager;
use App\Models\Entities\BlogEntity;

class BlogModel
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getAllBlogs() : Array | NULL  {
        try {
            // $returnVal = $this->entityManager->getRepository(BlogEntity::class)->findBy([], ['datePosted' => 'DESC']);
            $repository = $this->entityManager->getRepository(BlogEntity::class);
            $query = $repository->createQueryBuilder('b')->orderBy('b.datePosted', 'DESC')->setMaxResults(10)->getQuery();
            $returnVal = $query->getResult();
        } catch (\Throwable $e) {
            // ErrorHandler::getInstance()->handleError($e);
            print_r($e);die;
            return [];
        }
        return $returnVal;
    }

    public function getBlogArchive(int $start=0, int $limit=10) : Array | NULL  {
        // try {
        //     $returnVal = $this->entityManager->getRepository(BlogEntity::class)->findBy([], ['datePosted' => 'DESC']);
        // } catch (\Throwable $e) {
        //     ErrorHandler::getInstance()->handleError($e);
        //     return [];
        // }

        $repository = $this->entityManager->getRepository(BlogEntity::class);
        $query = $repository->createQueryBuilder('b')->orderBy('b.datePosted', 'DESC')
            ->setFirstResult($start)
            ->setMaxResults($limit)
            ->getQuery();
        $returnVal = $query->getResult();

        return $returnVal;
    }
 
    public function getBlogTotalCount() : int {
        $repository = $this->entityManager->getRepository(BlogEntity::class)
            ->createQueryBuilder('b')
            ->select('count(b.id)');
        $count = $repository->getQuery()->getSingleScalarResult();
        return $count;
    }

    public function getBlogByUrl($url='') : BlogEntity | NULL {
        $url = explode('/', rtrim($url, '/'));
        $returnVal = $this->entityManager->getRepository(BlogEntity::class)->findOneBy(['url' => $url]);
        return $returnVal;
    }

    public function getFeaturedBlog() : BlogEntity | NULL {
        // $returnVal = $this->entityManager->where('featured', 1)->orderBy('datePosted', 'desc')->getOne('blog');
        // $returnVal = $this->entityManager->getRepository(BlogEntity::class)->findOneBy(['featured' => 1]);

        // $repository = $this->entityManager->getRepository(BlogEntity::class);
        // $query = $repository->createQueryBuilder('b')->where('b.featured', '1')
        //     ->orderBy('b.datePosted', 'DESC')->setMaxResults(1)->getQuery();
        // $returnVal = $query->getOneOrNullResult();

        $repository = $this->entityManager->getRepository(BlogEntity::class);
        $query = $repository->createQueryBuilder('b')->where('b.featured = 1')
            ->orderBy('b.datePosted', 'DESC')->setMaxResults(1)->getQuery();
        $returnVal = $query->getOneOrNullResult();

        // echo $query->getSQL();die;
        // print_r($returnVal); die;
        return $returnVal;
    }
}