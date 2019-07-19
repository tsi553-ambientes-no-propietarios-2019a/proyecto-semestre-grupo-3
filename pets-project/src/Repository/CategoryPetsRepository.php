<?php

namespace App\Repository;

use App\Entity\CategoryPets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryPets|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryPets|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryPets[]    findAll()
 * @method CategoryPets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryPetsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryPets::class);
    }

    // /**
    //  * @return CategoryPets[] Returns an array of CategoryPets objects
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
    public function findOneBySomeField($value): ?CategoryPets
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
