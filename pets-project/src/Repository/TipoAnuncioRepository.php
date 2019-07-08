<?php

namespace App\Repository;

use App\Entity\TipoAnuncio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoAnuncio|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoAnuncio|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoAnuncio[]    findAll()
 * @method TipoAnuncio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoAnuncioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoAnuncio::class);
    }

    // /**
    //  * @return TipoAnuncio[] Returns an array of TipoAnuncio objects
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
    public function findOneBySomeField($value): ?TipoAnuncio
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
