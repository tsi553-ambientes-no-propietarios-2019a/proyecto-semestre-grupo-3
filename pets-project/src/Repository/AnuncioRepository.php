<?php

namespace App\Repository;

use App\Entity\Anuncio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Anuncio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anuncio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anuncio[]    findAll()
 * @method Anuncio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnuncioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Anuncio::class);
    }

    // /**
    //  * @return Anuncio[] Returns an array of Anuncio objects
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
    public function findOneBySomeField($value): ?Anuncio
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
