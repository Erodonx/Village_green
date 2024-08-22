<?php

namespace App\Controller;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\Persistence\ObjectManager; Inutile et trop complexe.
//use Doctrine\Bundle\DoctrineBundle\Registry;
//use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ManagerRegistry; //CET ATTRIBUT POUR MODIFIER LES CHAMPS PAS L'OBJECT MANAGER.
use Symfony\Component\Routing\Attribute\Route;


class ProduitController extends AbstractController
{
    private $produitRepository;
    public function __construct(ProduitRepository $produitRepository, /*ManagerRegistry $manager*/)
    {
        $this->produitRepository = $produitRepository;
        //$this->manager = $manager;
    }
    #[Route('/produit', name: 'app_produit')]
    public function index(ManagerRegistry $manager): Response
    {
  /*    $produit= new Produit();
        $produit->setNom('Violon')
                ->setDescription('Un super violon avec les cordes bien bien tendues')
                ->setPrixHT(10.50)
                ->setImage('Violon.jpg')
                ->setStock(65);
        $em = $doctrine->getManager();
        $em->persist($produit);
        $em->flush();*/
        $produits = $this->produitRepository->findAll();
        dump($produits);
        foreach ($produits as $produit)
        {
            if($produit->getNom()=='Violon')
            {
             $produit->setNom('Violoncelle');
             $produit->setPrixHT(150000);
            }
            else
            {
             $produit->setNom('Violon');
             $produit->setPrixHT(11);
            }
            /*$this->*/$manager->getManager()->persist($produit);
            /*$this->*/$manager->getManager()->flush();
        }
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
    #[Route('/produit/{slug}-{id}', name: 'app_produit_show', requirements: ['slug' => '[a-z0-9\-]*'])]
    //public function show($slug, $id): Response
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
