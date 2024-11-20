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
    public function findByFilters(string $sort): array
    {
        $qb = $this->createQueryBuilder('c');
        // Appliquer les critères de tri
        switch ($sort) {
            case 'date_de_commande_asc':
            $qb ->select('c')
                ->orderBy('c.dateCommande','ASC');
                break;
            case 'date_de_commande_desc':
                $qb->orderBy('c.dateCommande', 'DESC');
                break;
            case 'client_asc':
                $qb->select('c')
                   ->leftJoin('App\Entity\User', 'u',\Doctrine\ORM\Query\Expr\Join::WITH, 'c.user = u')
                   ->orderBy('u.nom', 'ASC');
                break;
            case 'client_desc':
                $qb->select('c') 
                   ->leftJoin('App\Entity\User', 'u',\Doctrine\ORM\Query\Expr\Join::WITH, 'c.user = u')
                   ->orderBy('u.    nom', 'DESC');
                break;
            case 'référence':
                $qb->orderBy('c.id', 'ASC');
                break;
            default:
                $qb->orderBy('c.id', 'ASC');
                
        }
        return $qb->getQuery()->getResult();;
    }
    public function JsonDataCom()
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('u.email','u.prenom','u.nom','c.id','c.dateCommande','c.montantCommandeTTC')
           ->leftJoin('App\Entity\User', 'u',\Doctrine\ORM\Query\Expr\Join::WITH, 'c.user = u');
           
        return $qb->getQuery()->getResult();
    }


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
