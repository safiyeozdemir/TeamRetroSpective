<?php

namespace App\Repository;

use App\Entity\BrainStorm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\DBAL\Driver\Connection;

class BrainStormRepository extends ServiceEntityRepository
{
    private $conn;

    public function __construct(ManagerRegistry $registry, Connection $conn)
    {
        parent::__construct($registry, BrainStorm::class);

        $this->conn = $conn;
    }

    // /**
    //  * @return BrainStorm[] Returns an array of BrainStorm objects
    //  */

    public function findAll($retroID = null)
    {
        $queryBuilder = $this->conn->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from('brain_storm')
            ->andWhere('retro_id= :val')
            ->setParameter('val',$retroID);

        $storms = $queryBuilder->execute()->fetchAll();

        return $storms;
    }

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