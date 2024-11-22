<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Repository\FournitRepository;
use App\Repository\RubriqueRepository;
use App\Repository\SousRubriqueRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(ProduitRepository $produitRepository,RubriqueRepository $rubriqueRepository, Request $request ): Response
    {
        $sort = $request->query->get('sort', 'popularity'); 
        $produits = $produitRepository->findByFilters($sort);
        $produits2= $produitRepository->findAll();
        $total = count($produits2);
        $rubriques = $rubriqueRepository->findAll();   
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            'produits' => $produits,
            'total' => $total,
            'rubriques' => $rubriques

        ]);
    }
    #[Route('/produit/{slug}-{id}', name: 'app_produit_show', requirements: ['slug' => '[a-z0-9\-]*'])]
    public function show(Produit $produit, string $slug,RubriqueRepository $rubriqueRepository)
    {
        //$produit = $this->produitRepository->find($id);
    if ($produit->getSlug() !== $slug)
    {
        return $this->redirectToRoute('app_produit_show', [
            'id' => $produit->getId(),
            'slug' => $produit->getSlug()
        ], 301);
    }
     $rubriques = $rubriqueRepository->findAll();
     return $this->render('produit/show.html.twig' , [
        'produit' => $produit,
        'rubriques' => $rubriques,
        'current_menu' => 'properties'
     ]);
    }
}
