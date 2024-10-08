<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name: 'app_panier')]
class PanierController extends AbstractController
{
    private $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }


    #[Route('/', name:'_index')]
    public function index(SessionInterface $session, ProduitRepository $produitRepo)
    {
        if($this->getUser()!=null)
        {
            $identifiant = $this->getUser()->getUserIdentifier();
        if($identifiant){
            $info = $this->userRepo->findOneBy(["email" =>$identifiant]);
            if($info->getReduction()!=null)
            {
                $reduction = $info->getReduction();
            }
        }
        }
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
    if (isset($reduction))
    {

     return $this->render('panier/index.html.twig', ['data' => $data, 'total' => $total, 'reduction' => $reduction ]);
    }else
    {
        return $this->render('panier/index.html.twig', compact('data', 'total'));
    }
    }
    #[Route('/ajout/{id}', name: '_ajout')]
    public function ajout(Produit $produit,SessionInterface $session)
    {     
    $id = $produit->getId();
    $panier = $session->get('panier', []);

    if(empty($panier[$id])){
        $panier[$id]=$_REQUEST['quantite'];
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