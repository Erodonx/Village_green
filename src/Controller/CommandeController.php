<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Detail;
use App\Entity\Produit;
use App\Entity\DetailLivraison;
use App\Entity\Livraison;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\CommandeType;
use App\Repository\ProduitRepository;
use App\Repository\UserRepository;
use DateTimeImmutable;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Validator\Constraints\Date;

class CommandeController extends AbstractController
{
    private $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }

    #[Route('/commande', name: 'app_commande')]
    public function index(Request $request, EntityManagerInterface $em, SessionInterface $session, ProduitRepository $prodRepo/*,User $user*/){

        if ($this->getUser()==null)
        {
            $this->addFlash('success' , 'Veuillez vous authentifiez pour commander.');
            return $this-> redirectToRoute('app_login');
        }
    
        $identifiant = $this->getUser()->getUserIdentifier();
        if($identifiant){
            $info = $this->userRepo->findOneBy(["email" =>$identifiant]);
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
        $data = $_REQUEST['commande'];
        $total = 0;
        $commande = new Commande();
        $livraison = new Livraison();
        $dateLiv = new DateTime("now");
        if ($data['typeLivraison']==1)
        {
        $dateLiv->modify('+3 days');
        $livraison->setNom('Relais colis');
        }else{
        $dateLiv->modify('+5 days');
        $livraison->setNom('A domicile');
        }
        $commande->setUser($this->getUser());
        foreach($panier as $item => $quantite)
        {
            $detailLivraison = new DetailLivraison();
            $detail = new Detail;
            $produit = $prodRepo->find($item);
            $detail->setProduit($produit);
            if ($info->getReduction()!=null)
            {
            $detail->setPrixTotalTTC(($produit->getPrixHT()*1.20)*$info->getReduction()*$quantite);
            $detail->setReduction($info->getReduction());
            }else{
            $detail->setPrixTotalTTC(($produit->getPrixHT()*1.20)*$quantite);
            }
            $detailLivraison->setProduit($produit);
            $detail->setQuantiteCommandee($quantite);
            $detailLivraison->setQuantite($quantite);
            $commande->addDetail($detail);
            $detailLivraison->setDateLivraison($dateLiv);
            $livraison->addDetailLivraison($detailLivraison);
            $total+=($produit->getPrixHT()*$quantite);
            $em->persist($detail);
            $em->persist($detailLivraison);
        }       
        $livraison->addDetailLivraison($detailLivraison);
        $commande->setMontantCommandeHT($total); 
         $commande->setMontantCommandeTTC(($total*1.20)*$info->getCoefficient());
         if ($info->getReduction()!=null)
         {
            $commande->setMontantCommandeTTC($commande->getMontantCommandeTTC()*$info->getReduction());
            $commande->setReduction('1');
            $commande->setValeurReduction($info->getReduction());
            $info->setReduction(null);
            $em->persist($info);
         }else
         {
            $commande->setReduction('0');
         }
        //}
        $commande->setAdresseFacturation($form->get('adresseFacturation')->getData());
        $commande->setVilleFacturation($form->get('villeFacturation')->getData());
        $commande->setAdresseLivraison($form->get('adresseLivraison')->getData());
        $commande->setVilleLivraison($form->get('villeLivraison')->getData());
        $commande->setMoyenDePaiement($form->get('moyenDePaiement')->getData());
        $date = new DateTimeImmutable();
        $commande->setDateCommande($date);
        
        $commande->setEtatLivraison('Commande en cours de livraison');
        $livraison->setCommande($commande);
        $em->persist($commande);
        $em->persist($livraison);

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
