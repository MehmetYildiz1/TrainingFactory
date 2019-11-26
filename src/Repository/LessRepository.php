<?php

namespace App\Repository;

use App\Entity\Less;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Less|null find($id, $lockMode = null, $lockVersion = null)
 * @method Less|null findOneBy(array $criteria, array $orderBy = null)
 * @method Less[]    findAll()
 * @method Less[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Less::class);
    }

    // /**
    //  * @return Less[] Returns an array of Less objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Less
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
