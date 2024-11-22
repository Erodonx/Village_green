<?php

namespace App\Controller\Admin;
use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\SousRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\Persistence\ObjectManager; Inutile et trop complexe.
//use Doctrine\Bundle\DoctrineBundle\Registry;
//use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry; //CET ATTRIBUT POUR MODIFIER LES CHAMPS PAS L'OBJECT MANAGER.
use PharIo\Manifest\Requirement;
use Vich\UploaderBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/admin/produit", name: 'app_admin_produit_')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProduitRepository $produitRepository, SousRubriqueRepository $sousRubriqueRepository, /*EntityManagerInterface $em*/): Response
    {
        $produits = $produitRepository->findAll();
        return $this->render('admin/produit/index.html.twig', [
            'produits' => $produits
        ]);
    }
    #[Route('/{id}/edit', name: 'edit', requirements: ['id' => Requirement::DIGITS])]
    public function edit(Produit $produit, Request $request, EntityManagerInterface $em)
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $form->getData()->setImage('');
            $em->flush();
            $this->addFlash('success', 'La modification du produit concerné a été enregistrée.');
            return $this->redirectToRoute('app_admin_produit_index');
        }
        return $this->render('admin/produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form
        ]);
    }
    #[Route('/create', name:'create')]
    public function create(Request $request, EntityManagerInterface $em)
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $form->getData()->setStock(0);
            $em->persist($produit);
            $em->flush();
            $this->addFlash('success', 'L\'ajout du produit dans la table a été effectué, n\'hésitez pas a utiliser éditer pour modifier l\'image.');
            return $this->redirectToRoute('app_admin_produit_index');
        }
        return $this->render('admin/produit/create.html.twig' , [
            'form' => $form
        ]);
    }
    #[Route('/{id}', name: 'delete', methods:['DELETE'])]
    public function remove(Produit $produit, EntityManagerInterface $em)
    {
        $em->remove($produit);
        $em->flush();
        $this->addFlash('success', 'Le produit a bien été supprimé');
        return $this->redirectToRoute('app_admin_produit_index');
    }
}
