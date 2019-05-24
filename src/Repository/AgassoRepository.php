<?php

namespace App\Repository;

use App\Entity\Agasso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Agasso|null find($id, $lockMode = null, $lockVersion = null)
 * @method Agasso|null findOneBy(array $criteria, array $orderBy = null)
 * @method Agasso[]    findAll()
 * @method Agasso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgassoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Agasso::class);
    }

    // /**
    //  * @return Agasso[] Returns an array of Agasso objects
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
    public function findOneBySomeField($value): ?Agasso
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
