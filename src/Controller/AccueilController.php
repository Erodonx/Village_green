<?php

namespace App\Controller;

use App\Repository\DetailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitRepository;
use App\Repository\RubriqueRepository;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Request;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProduitRepository $produitRepository,RubriqueRepository $rubriqueRepository,DetailRepository $detailRepository, Request $request): Response
    {
        $produits = $produitRepository->findAll();
        $rubriques = $rubriqueRepository->findAll();
        $total = count($produits);
        $details = $detailRepository->topVentes();
        $date = new DateTimeImmutable("now");
        $date->modify('-3 days');
                // Récupérer le critère de tri depuis l'URL (paramètre 'sort')
       $sort = $request->query->get('sort', 'newest'); ; // Valeur par défaut : 'newest'
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'produits' => $produits,
            'total' => $total,
            'rubriques' => $rubriques,
            'topprod' => $details
        ]);
    }
}