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
        $total = count($produits);
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
}
