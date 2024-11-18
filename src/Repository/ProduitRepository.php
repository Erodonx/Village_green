<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Produit>
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }


    public function findAllVisible() // un exemple test de la vidéo graphicart, a réadapter au contexte.
    {
        $nom='violon';
        return $this->createQueryBuilder('p')
        ->where('p.nom = :nom')
        ->setParameter('nom',$nom)
        ->getQuery()
        ->getResult();

    }
    public function Popularity()
    {
        return $this->createQueryBuilder('p')
        ->select('p')
        ->leftJoin('App\Entity\Detail', 'd ',\Doctrine\ORM\Query\Expr\Join::WITH, 'p = d.Produit')
        ->orderBy('SUM(d.quantiteCommandee)','DESC')
        ->groupBy('p.id')
        ->where('p IS NOT NULL')
        ->getQuery()
        ->getResult()
        ;

    }
    public function countId()
    {
        $qb = $this->createQueryBuilder('t')
            ->select('count(t.id)')
            ->getQuery()
            ->getSingleResult();
        return $qb;
    }
    public function findByFilters(string $sort): array
    {
        $qb = $this->createQueryBuilder('p');
        // Appliquer les critères de tri
        switch ($sort) {
            case 'popularity':
            $qb  ->select('p')
                ->leftJoin('App\Entity\Detail', 'd ',\Doctrine\ORM\Query\Expr\Join::WITH, 'p = d.Produit')
                ->orderBy('SUM(d.quantiteCommandee)','DESC')
                ->groupBy('p.id')
                ->where('p IS NOT NULL');
                break;
            case 'price_asc':
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
                $qb->orderBy('p.sousRubrique', 'ASC');
                
        }
        return $qb->getQuery()->getResult();;
    }
//    /**
//     * @return Produit[] Returns an array of Produit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Produit
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
