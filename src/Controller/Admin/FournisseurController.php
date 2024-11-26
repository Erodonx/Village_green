<?php

namespace App\Controller\Admin;
use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use App\Repository\FournisseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('admin/fournisseur', name: 'app_admin_fournisseur_')]
class FournisseurController extends AbstractController
{
    #[Route('/', name: 'index')]
     public function index(FournisseurRepository $fournisseurRepository): Response
    {
        $fournisseurs = $fournisseurRepository->findAll();
        return $this->render('admin/fournisseur/index.html.twig', [
            'fournisseurs' => $fournisseurs,
        ]);
    }
    #[Route('/create', name:'create')]
    public function create(Request $request, EntityManagerInterface $em)
    {
        $fournisseur = new Fournisseur();
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($fournisseur);
            $em->flush();
            $this->addFlash('success', 'L\'ajout du fournisseur dans la base de données a été effectué.');
            return $this->redirectToRoute('app_admin_fournisseur_index');
        }
        return $this->render('admin/fournisseur/create.html.twig' , [
            'form' => $form
        ]);
    }
    #[Route('/{id}/edit', name: 'edit', requirements: ['id' => Requirement::DIGITS])]
    public function edit(Fournisseur $fournisseur, Request $request, EntityManagerInterface $em)
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'La modification du produit concerné a été enregistrée.');
            return $this->redirectToRoute('app_admin_fournisseur_index');
        }
        return $this->render('admin/fournisseur/edit.html.twig', [
            'fournisseur' => $fournisseur,
            'form' => $form
        ]);
    }
    #[Route('/{id}', name:'delete', methods:['DELETE'])]
    public function remove(Fournisseur $fournisseur, EntityManagerInterface $em)
    {
        if($fournisseur->getProduct()!=null)
        {
            $this->addFlash('danger', 'Vous ne pouvez pas supprimer un fournisseur ayant des produits attribués.');
            return $this->redirectToRoute('app_admin_fournisseur_index');
        }
        $em->remove($fournisseur);
        $em->flush();
        $this->addFlash('success', 'Le fournisseur a bien été supprimée');
        return $this->redirectToRoute('app_admin_fournisseur_index');

    }

}