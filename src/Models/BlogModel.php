<?php
declare(strict_types=1);

namespace App\Models;

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
            $returnVal = $this->entityManager->getRepository(BlogEntity::class)->findBy([], ['datePosted' => 'DESC']);
// print_r($posts); die;
        } catch (\Throwable $e) {
            ErrorHandler::getInstance()->handleError($e);
            return [];
        }
        return $returnVal;
    }

    public function getBlogArchive() : Array | NULL  {
        $returnVal = $this->entityManager->orderBy('datePosted','desc')->get('blog');
        return $returnVal;
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