<?php

namespace App\Controller\Performances;

use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ChiffreMoisController extends AbstractController
{
    #[Route('/performances/chiffre/{annee}', name: 'app_performances_chiffre_annee')]
    public function index($annee,CommandeRepository $commandes): Response
    {
     $result [] = ["Mois", "Ventes"];
     $result [] = ["01",floatval(0)];
     $result [] = ["02",floatval(0)];
     $result [] = ["03",floatval(0)];
     $result [] = ["04",floatval(0)];
     $result [] = ["05",floatval(0)];
     $result [] = ["06",floatval(0)];
     $result [] = ["07",floatval(0)];
     $result [] = ["08",floatval(0)];
     $result [] = ["09",floatval(0)];
     $result [] = ["10",floatval(0)];
     $result [] = ["11",floatval(0)];
     $result [] = ["12",floatval(0)];
    $calc = $commandes->CAparan($annee);
     foreach ($calc as $ligne) {
     for($i=0;$i<12;$i++)
     {
    if($result[$i][0]=="0".strval($ligne["MOIS DE L'ANNEE"]))
    {
     $result [$i][1] = floatval($ligne["CHIFFRE D'AFFAIRE DU MOIS"]);
     }
    }
}
    return $this->json($result);
    
   
    
    //select produit.nom, sum(detail.quantite_commandee*produit.prix_ht)*1.20 from produit join detail on detail.produit_id = produit.id group by produit.nom;
}
}