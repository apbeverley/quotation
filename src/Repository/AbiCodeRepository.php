<?php

namespace App\Repository;

use App\Entity\AbiCodeRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AbiCodeRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbiCodeRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbiCodeRating[]    findAll()
 * @method AbiCodeRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbiCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbiCodeRating::class);
    }

    // /**
    //  * @return AbiCodeRating[] Returns an array of AbiCodeRating objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AbiCodeRating
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
