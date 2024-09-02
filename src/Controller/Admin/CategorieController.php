<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/admin/categorie', name: 'app_admin_categorie_')]
class CategorieController extends AbstractController{


    #[Route(name: 'index')]
    public function index(CategorieRepository $repository)
    {
        return $this->render('admin/categorie/index.html.twig', [
            'categories' => $repository->findAll()
        ]);


    }

    #[Route('/create', name:'create')]
    public function create(Request $request, EntityManagerInterface $em)
    {
        $categorie =  new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($categorie);
            $em->flush();
            $this->addFlash('succees', 'La catégorie a bien été crée');
            return $this->redirectToRoute('app_admin_categorie_index');
        }
        return $this->render('admin/categorie/create.html.twig', [
            'form' => $form
        ]);


    }

    #[Route('/{id}/edit', name:'edit', requirements:['id' => Requirement::DIGITS])]
    public function edit(Categorie $categorie,Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('succees', 'La catégorie a bien été modifiée');
            return $this->redirectToRoute('app_admin_categorie_index');
        }
        return $this->render('admin/categorie/edit.html.twig', [
            'categorie' => $categorie,
            'form' => $form
        ]);
    }

    #[Route('/{id}', name:'delete', methods:['DELETE'])]
    public function remove(Categorie $categorie, EntityManagerInterface $em)
    {
        $em->remove($categorie);
        $em->flush();
        $this->addFlash('success', 'La categorie a bien été supprimée');
        return $this->redirectToRoute('app_admin_categorie_index');

    }
}