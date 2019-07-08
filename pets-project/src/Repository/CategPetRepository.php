<?php

namespace App\Repository;

use App\Entity\CategPet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategPet|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategPet|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategPet[]    findAll()
 * @method CategPet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategPetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategPet::class);
    }

    // /**
    //  * @return CategPet[] Returns an array of CategPet objects
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
    public function findOneBySomeField($value): ?CategPet
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
