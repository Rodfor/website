<?php

namespace App\Repository;

use App\Entity\PriceGuide;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PriceGuide|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceGuide|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceGuide[]    findAll()
 * @method PriceGuide[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceGuideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceGuide::class);
    }

    // /**
    //  * @return PriceGuide[] Returns an array of PriceGuide objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PriceGuide
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
