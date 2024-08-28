<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\Persistence\ObjectManager; Inutile et trop complexe.
//use Doctrine\Bundle\DoctrineBundle\Registry;
//use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry; //CET ATTRIBUT POUR MODIFIER LES CHAMPS PAS L'OBJECT MANAGER.
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;


class ProduitController extends AbstractController
{
   /* private $produitRepository;
    public function __construct(ProduitRepository $produitRepository, /*ManagerRegistry $manager*///)
   /* {
        /*$this->produitRepository = $produitRepository;
        //$this->manager = $manager;
    }*/
    #[Route('/produit', name: 'app_produit')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();
  /*    $produit= new Produit();
        $produit->setNom('Violon')
                ->setDescription('Un super violon avec les cordes bien bien tendues')
                ->setPrixHT(10.50)
                ->setImage('Violon.jpg')
                ->setStock(65);
        $em = $doctrine->getManager();
        $em->persist($produit);
        $em->flush();*/
        /*dump($produits);
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
            /*$this->*//*$manager->getManager()->persist($produit);
            /*$this->*//*$manager->getManager()->flush();/*
        }*/
        return $this->render('produit/index.html.twig', [
            'produits' => $produits
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
    #[Route('/produit/{id}/edit', name: 'app_produit_edit')]
    public function edit(Produit $produit, Request $request, EntityManagerInterface $em)
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'La modification du produit concerné a été enregistrée.');
            return $this->redirectToRoute('app_produit');
        }
        return $this->render('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form
        ]);
    }
    #[Route('/produit/create', name:'app_produit_create')]
    public function create(Request $request, EntityManagerInterface $em)
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($produit);
            $em->flush();
            $this->addFlash('success', 'L\'ajout du produit dans la table a été effectué');
            return $this->redirectToRoute('app_produit');
        }
        return $this->render('produit/create.html.twig' , [
            'form' => $form
        ]);
    }
    #[Route('/produit/{id}', name: 'app_produit_delete', methods:['DELETE'])]
    public function remove(Produit $produit, EntityManagerInterface $em)
    {
        $em->remove($produit);
        $em->flush();
        $this->addFlash('success', 'Le produit a bien été supprimé');
        return $this->redirectToRoute('app_produit');
    }
}
