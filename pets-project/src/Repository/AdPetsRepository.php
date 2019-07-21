<?php

namespace App\Repository;

use App\Entity\AdPets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AdPets|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdPets|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdPets[]    findAll()
 * @method AdPets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdPetsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AdPets::class);
    }

    // /**
    //  * @return AdPets[] Returns an array of AdPets objects
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
    public function findOneBySomeField($value): ?AdPets
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
