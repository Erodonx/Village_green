<?php

namespace App\Controller\Performances;

use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommandesController extends AbstractController
{
    #[Route('/performances/commandes/', name: 'app_performances_commandes')]
    public function index(CommandeRepository $repo): Response
    {
        $result = [];
        $result[] =  [];
        $calc = $repo->JsonDataCom();
        $i=0;
        foreach ($calc as $ligne)
        {
            $result[$i]['email']=$ligne['email'];
            $result[$i]['prenom']=$ligne['prenom'];
            $result[$i]['nom'] = $ligne['nom'];
            $result[$i]['id'] = $ligne['id'];
            $result[$i]['dateCommande'] = $ligne['dateCommande'];
            $result[$i]['montantCommandeTTC']=floatval($ligne['montantCommandeTTC']);
            $i=$i+1;
        }
        //dd($calc);
        //foreach ($calc as $ligne) {
        //    $result[] =  [$ligne["nom"], floatval($ligne[1])];
        //}
        return $this->json($result);
    }
    
    
    //select produit.nom, sum(detail.quantite_commandee*produit.prix_ht)*1.20 from produit join detail on detail.produit_id = produit.id group by produit.nom;
}