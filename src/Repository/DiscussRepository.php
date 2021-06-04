<?php

namespace App\Repository;

use App\Entity\Discuss;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Discuss|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discuss|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discuss[]    findAll()
 * @method Discuss[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscussRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Discuss::class);
    }

    // /**
    //  * @return Discuss[] Returns an array of Discuss objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Discuss
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
