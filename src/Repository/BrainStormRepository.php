<?php

namespace App\Repository;

use App\Entity\BrainStorm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BrainStorm|null find($id, $lockMode = null, $lockVersion = null)
 * @method BrainStorm|null findOneBy(array $criteria, array $orderBy = null)
 * @method BrainStorm[]    findAll()
 * @method BrainStorm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrainStormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BrainStorm::class);
    }

    // /**
    //  * @return BrainStorm[] Returns an array of BrainStorm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BrainStorm
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
