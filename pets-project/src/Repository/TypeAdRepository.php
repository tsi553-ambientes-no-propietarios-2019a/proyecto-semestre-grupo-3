<?php

namespace App\Repository;

use App\Entity\TypeAd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeAd|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAd|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAd[]    findAll()
 * @method TypeAd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAdRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeAd::class);
    }

    // /**
    //  * @return TypeAd[] Returns an array of TypeAd objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeAd
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
