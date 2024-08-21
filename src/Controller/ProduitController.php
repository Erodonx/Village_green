<?php

namespace App\Controller;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function index(): Response
    {
        /*$produit= new Produit();
        $produit->setNom('Violon')
                ->setDescription('Un super violon avec les cordes bien bien tendues')
                ->setPrixHT(10.50)
                ->setImage('Violon.jpg')
                ->setStock(65);
        $em = $this;
        $em->persist($produit);
        $em->flush();*/

        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
}
