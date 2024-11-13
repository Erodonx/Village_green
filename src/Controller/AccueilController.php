<?php

namespace App\Controller;

use App\Repository\DetailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitRepository;
use App\Repository\RubriqueRepository;
use DateTime;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProduitRepository $produitRepository,RubriqueRepository $rubriqueRepository,DetailRepository $detailRepository): Response
    {
        $produits = $produitRepository->findAll();
        $rubriques = $rubriqueRepository->findAll();
        $total = count($produits);
        $details = $detailRepository->topVentes();
        $date = new DateTime("now");
        $date->modify('-3 days');
        //dd($date);
       // dd($details);
       /* $top1=$produitRepository->findById($details[0][1]);
        $top2=$produitRepository->findById($details[1][1]);
        $top3=$produitRepository->findById($details[2][1]);*/
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'produits' => $produits,
            'total' => $total,
            'rubriques' => $rubriques,
            'topprod' => $details
         /*   'top1' => $top1,
            'top2' => $top2,
            'top3' => $top3 */
        ]);
    }
}