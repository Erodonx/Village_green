<?php

namespace App\Repository;

use App\Entity\Fournit;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fournit>
 */
class FournitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fournit::class);
    }

    public function update_stock_produit(DateTime $date)
    {
        $qb = $this->createQueryBuilder('t')
            // ->select('t.produit,t.quantiteLivree')
            ->setParameter('date', $date)
            ->where('t.dateLivraison < :date')
            ->getQuery()
            ->getResult();
        return $qb;
    }

    //    /**
    //     * @return Fournit[] Returns an array of Fournit objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Fournit
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
