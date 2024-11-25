<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
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
                   ->orderBy('u.nom', 'DESC');
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
    public function TotalVentesSansReduc()
    {
        return $this->createQueryBuilder('c')
                    ->select('SUM(c.montantCommandeHT)')
                    ->where('c.valeurReduction = 1 AND c.coefficient = 1')
                    ->getQuery()
                    ->getResult();
    }
    public function TotalVentes()
    {
        return $this->createQueryBuilder('c')
                    ->select('SUM(c.montantCommandeHT)')
                    ->where('c.valeurReduction != 1 OR c.coefficient != 1')
                    ->getQuery()
                    ->getResult();
    }
    

    public function CAparan($annee)
    {
        //$conn = $this->getEntityManager()->getConnection();
        //$sql = "SELECT sum(montant_commande_ht) AS 'CHIFFRE D\'AFFAIRE DU MOIS', MONTH(date_commande) AS 'MOIS DE L\'ANNEE' from commande where YEAR(date_commande)=".$annee." GROUP BY MONTH(date_commande);";
        //$stmt = $conn->prepare($sql);
        //$result = $stmt->executeQuery();
        //return $result->fetchAllAssociative();


        //$sql = 'SELECT sum(montant_commande_ttc), MONTH(date_commande) from commande where YEAR(date_commande)=2024 GROUP BY MONTH(date_commande);';
        return $this->createQueryBuilder('c')
                    ->select('sum(c.montantCommandeTTC) AS CHIFFRE_D_AFFAIRE_MOIS','MONTH(c.dateCommande) AS MOIS_DE_L_ANNEE')
                    ->where('YEAR(c.dateCommande) = :annee')
                    ->setParameter('annee', $annee)
                    ->groupBy('MOIS_DE_L_ANNEE')
                    ->getQuery()
                    ->getResult();   
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
