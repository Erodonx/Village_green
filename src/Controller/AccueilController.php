<?php

namespace App\Controller;

use App\Repository\DetailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitRepository;
use App\Repository\RubriqueRepository;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProduitRepository $produitRepository,RubriqueRepository $rubriqueRepository,DetailRepository $detailRepository): Response
    {
        $produits = $produitRepository->findAll();
        $rubriques = $rubriqueRepository->findAll();
        $total = count($produits);
        $detail = $detailRepository->topVentes();
        //dd($detail);
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'produits' => $produits,
            'total' => $total,
            'rubriques' => $rubriques
        ]);
    }
}