<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitRepository;
class AccueilController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();
        $total = $produitRepository->countId();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'produits' => $produits,
            'total' => $total
        ]);
    }
}
