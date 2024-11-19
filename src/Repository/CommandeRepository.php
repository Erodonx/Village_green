<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commande>
 */
class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    //    /**
    //     * @return Commande[] Returns an array of Commande objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }
    
    public function findByUser2($value):array
    {
        return $this->createQueryBuilder('c')
        ->andWhere('c.user = :valeur')
        ->setParameter('valeur', $value)
        ->getQuery()
        ->getResult()
        ;
    }
    /*public function findByFilters(string $sort): array
    {
        $qb = $this->createQueryBuilder('c');
        // Appliquer les critères de tri
        switch ($sort) {
            case 'par_client':
            $qb ->select('c')
                ->leftJoin('App\Entity\User', 'u',\Doctrine\ORM\Query\Expr\Join::WITH, 'u = c.User')
                ->orderBy('u.email','DESC');
                break;
           /* case 'price_asc':
                $qb->orderBy('p.prix_HT', 'ASC');
                break;
            case 'price_desc':
                $qb->orderBy('p.prix_HT', 'DESC');
                break;
            case 'alphabetical_asc':
                $qb->orderBy('p.nom', 'ASC');
                break;
            case 'alphabetical_desc':
                $qb->orderBy('p.nom', 'DESC');
                break;
            default:
                $qb->orderBy('c.User', 'ASC');
                
        }
        return $qb->getQuery()->getResult();;
    }*/


    //    public function findOneBySomeField($value): ?Commande
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
