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
     $result = [];
     $result[] =  ["Mois", "Ventes"];
     $calc = $commandes->CAparan($annee);
     foreach ($calc as $ligne) {
     $result[] =  [strval($ligne["MOIS DE L'ANNEE"]),floatval($ligne["CHIFFRE D'AFFAIRE DU MOIS"])];
       
    }
    return $this->json($result);
    
   
    
    //select produit.nom, sum(detail.quantite_commandee*produit.prix_ht)*1.20 from produit join detail on detail.produit_id = produit.id group by produit.nom;
}
}