<?php

namespace App\Controller\Performances;

use App\Repository\DetailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ChiffreController extends AbstractController
{
    #[Route('/performances/chiffre/', name: 'app_performances_chiffre')]
    public function index(DetailRepository $detail): Response
    {
        $result = [];
        $result[] =  ["Fournisseur", "Chiffre d'affaire"];
        $calc = $detail->CAfournisseur();
        //dd($calc);
        foreach ($calc as $ligne) {
            $result[] =  [$ligne["nom"], floatval($ligne[1])];
        }
        return $this->json($result);
    }
    
    
    //select produit.nom, sum(detail.quantite_commandee*produit.prix_ht)*1.20 from produit join detail on detail.produit_id = produit.id group by produit.nom;
}