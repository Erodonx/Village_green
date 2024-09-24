<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name: 'app_panier')]
class PanierController extends AbstractController
{

    #[Route('/', name:'_index')]
    public function index(SessionInterface $session, ProduitRepository $produitRepo)
    {
        $panier = $session->get('panier', []);
        $data = [];
        $total =0;
        
        foreach($panier as $id => $quantite){
           $produit = $produitRepo->find($id);
        
        $data[] = [
            'produit' => $produit,
            'quantite' => $quantite
        ];
        $total += $produit->getPrixHT() * $quantite;
        }
     return $this->render('panier/index.html.twig', compact('data', 'total'));
    }
    #[Route('/ajout/{id}', name: '_ajout')]
    public function ajout(Produit $produit,SessionInterface $session)
    {
     
    $id = $produit->getId();

    $panier = $session->get('panier', []);

    if(empty($panier[$id])){
        $panier[$id]=1;
    }else{
        $panier[$id]++;
    }
     $session->set('panier', $panier);
     return $this->redirectToRoute('app_panier_index');
    }
    #[Route('/enlever/{id}', name: '_enlever')]
    public function enlever(Produit $produit,SessionInterface $session)
    {
     
    $id = $produit->getId();

    $panier = $session->get('panier', []);

    if(!empty($panier[$id])){
        if($panier[$id]>1){
        $panier[$id]--;
    }else{
        unset($panier[$id]);
    }
    }
     $session->set('panier', $panier);
     return $this->redirectToRoute('app_panier_index');
    }
    #[Route('/supprimer/{id}', name: '_supprimer')]
    public function supprimer(Produit $produit,SessionInterface $session)
    {
     
    $id = $produit->getId();

    $panier = $session->get('panier', []);

    if(!empty($panier[$id])){
        unset($panier[$id]);
    }
     $session->set('panier', $panier);
     return $this->redirectToRoute('app_panier_index');
    }
    #[Route('/vider', name: '_vider')]
    public function vider(SessionInterface $session)
    {
        $session->remove('panier');
        return $this->redirectToRoute('app_panier_index');
    }
}