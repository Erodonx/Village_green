<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Repository\FournitRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(ProduitRepository $produitRepository, FournitRepository $fournis): Response
    {
        $produits = $produitRepository->findAll();
        $total = $produitRepository->countId();
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            'produits' => $produits,
            'total' => $total,

        ]);
    }
    #[Route('/produit/{slug}-{id}', name: 'app_produit_show', requirements: ['slug' => '[a-z0-9\-]*'])]
    public function show(Produit $produit, string $slug)
    {
     //$produit = $this->produitRepository->find($id);
     if ($produit->getSlug() !== $slug)
     {
        return $this->redirectToRoute('app_produit_show', [
            'id' => $produit->getId(),
            'slug' => $produit->getSlug()
        ], 301);
     }
     return $this->render('produit/show.html.twig' , [
        'produit' => $produit,
        'current_menu' => 'properties'
     ]);
    }
    #[Route('/produit/stock', name:'app_produit_update')]
    public function updateStock(FournitRepository $fournit,EntityManagerInterface $em)
    {
       $tab=$fournit->update_stock_produit(new DateTime("now"));
       $total=array();
       foreach ($tab as $livraison)
       {
        if (!isset($total[$livraison->getProduit()->getId()]))
        {
         $total[$livraison->getProduit()->getId()]=0;
        }
        $total[$livraison->getProduit()->getId()]=$total[$livraison->getProduit()->getId()]+$livraison->getQuantiteLivree();
        //$livraison->getProduit()->setStock($livraison->getProduit()->getStock()+$livraison->getQuantiteLivree());
       }
       foreach ($tab as $livraison)
       {
        if ($livraison->getProduit()->getStock()!=$total[$livraison->getProduit()->getId()])
        $livraison->getProduit()->setStock($total[$livraison->getProduit()->getId()]);
       }

       $em->flush();
       return $this->redirectToRoute('app_produit');
    }
}
