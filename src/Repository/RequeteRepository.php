<?php

namespace App\Repository;

use App\Entity\Requete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Requete>
 */
class RequeteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Requete::class);
    }

//    /**
//     * @return Requete[] Returns an array of Requete objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }
public function findByClient2($value):array
{
    return $this->createQueryBuilder('c')
    ->andWhere('c.client = :vale')
    ->setParameter('vale', $value)
    ->getQuery()
    ->getResult()
    ;
}
//    public function findOneBySomeField($value): ?Requete
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
