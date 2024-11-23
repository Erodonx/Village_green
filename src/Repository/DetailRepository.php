<?php

namespace App\Repository;

use App\Entity\Detail;
use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Detail>
 */
class DetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Detail::class);
    }

    //    /**
    //     * @return Detail[] Returns an array of Detail objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }
        public function topVentes()
        {
            return $this->createQueryBuilder('c')
            ->select('c','SUM(c.quantiteCommandee)')
            ->orderBy('SUM(c.quantiteCommandee)','DESC')
            ->groupBy('c.Produit')
            ->getQuery()
            ->setMaxResults(3)

            ->getResult()
            ;

        }
        /*public function CAfournisseur1()
        {
        return $this->createQueryBuilder('d')
        ->select('f.nom','sum(p.prix_HT*d.quantiteCommandee*1.20)')
        ->leftJoin('App\Entity\Produit','p',\Doctrine\ORM\Query\Expr\Join::WITH , 'p = d.Produit')
        ->leftJoin('App\Entity\Fournisseur','f',\Doctrine\ORM\Query\Expr\Join::WITH, 'f = p.Fournisseur')
        ->leftJoin('App\Entity\Commande', 'c' ,\Doctrine\ORM\Query\Expr\Join::WITH, 'c = d.Commande')
        ->where('c.reduction=0')
        ->groupBy('f.nom')
        ->getQuery()
        ->getResult();
        }
        public function CAfournisseurReduction()
        {
        return $this->createQueryBuilder('d')
        ->select('f.nom','sum(p.prix_HT*d.quantiteCommandee*1.20)*c.valeurReduction')
        ->leftJoin('App\Entity\Produit','p',\Doctrine\ORM\Query\Expr\Join::WITH , 'p = d.Produit')
        ->leftJoin('App\Entity\Fournisseur','f',\Doctrine\ORM\Query\Expr\Join::WITH, 'f = p.Fournisseur')
        ->leftJoin('App\Entity\Commande', 'c' ,\Doctrine\ORM\Query\Expr\Join::WITH, 'c = d.Commande')
        ->where('c.reduction>0')
        ->groupBy('f.nom')
        ->getQuery()
        ->getResult();
        }*/

        public function ProduitLesPlusVenduSansReduc()
        {
         return $this->createQueryBuilder('d')
                ->select('p.nom','f.nom as nomFournisseur','SUM(d.quantiteCommandee)','SUM(d.prixHTDateCom*d.quantiteCommandee)')
                ->leftJoin('App\Entity\Produit','p',\Doctrine\ORM\Query\Expr\Join::WITH , 'p = d.Produit')
                ->leftJoin('App\Entity\Commande', 'c' , \Doctrine\ORM\Query\Expr\Join::WITH , 'c = d.Commande')
                ->leftJoin('App\Entity\Fournisseur','f',\Doctrine\ORM\Query\Expr\Join::WITH, 'f = p.Fournisseur')
                ->where('d.reduction = 1 AND c.coefficient = 1')
                ->orderBy('SUM(d.quantiteCommandee)','DESC')
                ->groupBy('d.Produit')
                ->getQuery()
                ->getResult();
        }
        public function CAfournisseur()
        {
        return $this->createQueryBuilder('d')
        ->select('f.nom','SUM(d.prixHTDateCom*d.quantiteCommandee*d.reduction*c.coefficient)')
        ->leftJoin('App\Entity\Commande','c',\Doctrine\ORM\Query\Expr\Join::WITH , 'c = d.Commande')
        ->leftJoin('App\Entity\Produit','p',\Doctrine\ORM\Query\Expr\Join::WITH , 'p = d.Produit')
        ->leftJoin('App\Entity\Fournisseur','f',\Doctrine\ORM\Query\Expr\Join::WITH, 'f = p.Fournisseur')
        ->groupBy('f.nom')
        ->getQuery()
        ->getResult();
        }
        public function ProduitLesPlusVendu()
        {
         return $this->createQueryBuilder('d')
                ->select('p.nom','f.nom as nomFournisseur','SUM(d.quantiteCommandee)','SUM(d.prixHTDateCom*d.quantiteCommandee)*c.coefficient*d.reduction','c.coefficient', 'd.reduction')
                ->leftJoin('App\Entity\Produit','p',\Doctrine\ORM\Query\Expr\Join::WITH , 'p = d.Produit')
                ->leftJoin('App\Entity\Commande', 'c' , \Doctrine\ORM\Query\Expr\Join::WITH , 'c = d.Commande')
                ->leftJoin('App\Entity\Fournisseur','f',\Doctrine\ORM\Query\Expr\Join::WITH, 'f = p.Fournisseur')
                ->where('d.reduction != 1 OR c.coefficient !=1')
                ->orderBy('SUM(d.quantiteCommandee)','DESC')
                ->groupBy('d.id')
                ->getQuery()
                ->getResult();
        }


    //    public function findOneBySomeField($value): ?Detail
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}