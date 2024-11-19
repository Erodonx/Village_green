<?php

namespace App\Controller\Admin;

use App\Repository\DetailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PerformancesController extends AbstractController
{
    #[Route('admin/performances/', name: 'app_admin_performances_index')]
    public function index(DetailRepository $repo): Response
    {
        $listeProd = $repo->ProduitLesPlusVendu();
        $total = $repo->TotalVentes();
        return $this->render('admin/performances/index.html.twig', [
            'controller_name' => 'IndexController',
            'listeProduitVendu' => $listeProd,
            'total' => $total,
        ]);
    }//select produit.nom, sum(detail.quantite_commandee*produit.prix_ht)*1.20 from produit join detail on detail.produit_id = produit.id group by produit.nom;
}//select fournisseur.nom, sum(produit.prix_ht*detail.quantite_commandee)*1.20 from fournisseur join produit on produit.fournisseur_id = fournisseur.id join detail on produit.id = detail.produit_id join commande on commande.id=detail.commande_id where commande.reduction=0 group by fournisseur.nom;
//select fournisseur.nom, sum(produit.prix_ht*detail.quantite_commandee)*1.20*commande.valeur_reduction from fournisseur join produit on produit.fournisseur_id = fournisseur.id join detail on produit.id = detail.produit_id join commande on commande.id=detail.commande_id where commande.reduction=1 group by fournisseur.nom