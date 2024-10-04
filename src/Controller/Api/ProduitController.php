<?php

namespace App\Controller\Api;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class ProduitController extends AbstractController

{


    #[Route("/api/produits")]
    public function index (ProduitRepository $repository)
    {
        $produit = $repository->findAll();
        return $this->json($produit, 200,[],[
            'groups' => ['produit.index','produit.show']
        ]);
         
    }
    #[Route("/api/produits/{id}", requirements:['id' => Requirement::DIGITS])]
    public function show(Produit $produit)
    {
        return $this->json($produit, 200,[],[
            'groups' => ['produit.index','produit.show']
        ]);
         
    }
    
    
}