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
        $calc1=$detail->CAfournisseur1();
        $calc2=$detail->CAfournisseurReduction();
        $tabreduc = [];
        $tabreduc[] =  ["Fournisseur", "Chiffre d'affaire"];

        foreach ($calc1 as $ligne)
        {
        foreach ($calc2 as $lignebis)
        {
        if($ligne['nom']==$lignebis['nom'])
        {
         $tabreduc[] = [$ligne['nom'],floatval($ligne[1]+$lignebis[1])];
        }
    }    
    }
        dd($tabreduc);
        $result = [];
        $result[] =  ["Fournisseur", "Chiffre d'affaire"];
        //$calc = $detail->CAfournisseur();
        //dd($calc);
        foreach ($calc1 as $ligne) {
            $result[] =  [$ligne["nom"], floatval($ligne[1])];
        }
        $longueurReduc=count($tabreduc);
        $longueur=count($result);
        if($longueur>$longueurReduc)
        {
        for ($i = 0; $i<count($tabreduc); $i++)
        {
            if($result[$i][1]<($tabreduc[$i][1]))
            {
                $result[$i][1]=$tabreduc[$i][1];
            }

        }
    }else{
        for ($i = 0; $i<count($result); $i++)
        {
            if($result[$i][1]<($tabreduc[$i][1]))
            {
                $result[$i][1]=$tabreduc[$i][1];
            }

        }
    }
        return $this->json($result);
    }
    
    //$result = [];
    //$result[] =  ["Fournisseur", "Chiffre d'affaire"];
    //$calc = $detail->CAfournisseur();
    //foreach ($calc as $ligne) {
    //    $result[] =  [$ligne["nom"], floatval($ligne[1])];
    
    //select produit.nom, sum(detail.quantite_commandee*produit.prix_ht)*1.20 from produit join detail on detail.produit_id = produit.id group by produit.nom;
}