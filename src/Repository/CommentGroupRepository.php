<?php

namespace App\Repository;

use App\Entity\CommentGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommentGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentGroup[]    findAll()
 * @method CommentGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentGroup::class);
    }

    // /**
    //  * @return CommentGroup[] Returns an array of CommentGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommentGroup
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
