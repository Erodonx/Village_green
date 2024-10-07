<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Detail;
use App\Entity\Produit;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\CommandeType;
use App\Repository\ProduitRepository;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Validator\Constraints\Date;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(Request $request, EntityManagerInterface $em, SessionInterface $session, ProduitRepository $prodRepo/*,User $user*/){

        if ($this->getUser()==null)
        {
            $this->addFlash('success' , 'Veuillez vous authentifiez pour commander.');
            return $this-> redirectToRoute('app_login');
        }
        $panier = $session->get('panier', []);
        if ($panier === [])
        {
         $this->addFlash('warning' , 'Votre panier est vide');
         return $this-> redirectToRoute('home');
        }
        $form = $this->createForm(CommandeType::class);
        $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid())
    {               
        $total = 0;
        $commande = new Commande();
        $commande->setUser($this->getUser());
        foreach($panier as $item => $quantite)
        {
            $detail = new Detail;
            $produit = $prodRepo->find($item);
            $detail->setProduit($produit);
            $detail->setQuantiteCommandee($quantite);
            $commande->addDetail($detail);
            $total+=($produit->getPrixHT()*$quantite);
            $em->persist($detail);
        }
        $commande->setMontantCommandeHT($total); 
        
        //if($user->getReduction()!=null)
        //{
        // $commande->setMontantCommandeHT(($total*1.20)*$user->getReduction());
        //}else
        //{
         $commande->setMontantCommandeTTC($total*1.20);
        //}
        $commande->setAdresseFacturation($form->get('adresseFacturation')->getData());
        $commande->setVilleFacturation($form->get('villeFacturation')->getData());
        $commande->setAdresseLivraison($form->get('adresseLivraison')->getData());
        $commande->setVilleLivraison($form->get('villeLivraison')->getData());
        $commande->setMoyenDePaiement($form->get('moyenDePaiement')->getData());
        $date = new DateTime("now");
        $commande->setDateCommande($date);
        $commande->setReduction('0');
        $commande->setEtatLivraison('Commande validée');
        $em->persist($commande);
        //$user->setReduction(null);
        $em->flush();

        $session->remove('panier');

        $this->addFlash('success' , 'Merci pour votre commande sur Village Green =)');
        return $this->redirectToRoute('home');
        
    }
    return $this->render('commande/index.html.twig', [
        'commande' => $form,
    ]);
}
}
