<?php

namespace App\Repository;

use App\Entity\Cantones;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cantones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cantones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cantones[]    findAll()
 * @method Cantones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CantonesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cantones::class);
    }

    // /**
    //  * @return Cantones[] Returns an array of Cantones objects
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
    public function findOneBySomeField($value): ?Cantones
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
