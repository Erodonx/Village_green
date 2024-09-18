<?php

namespace App\Controller\Admin;

use App\Entity\SousRubrique;
use App\Form\SousRubriqueType;
use App\Repository\SousRubriqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/admin/rubrique', name: 'app_admin_sousRubrique_')]
class SousRubriqueController extends AbstractController{


    #[Route(name: 'index')]
    public function index(SousRubriqueRepository $repository)
    {
        return $this->render('admin/sousRubrique/index.html.twig', [
            'sousRubriques' => $repository->findAll()
        ]);


    }

    #[Route('/create', name:'create')]
    public function create(Request $request, EntityManagerInterface $em)
    {
        $sousRubrique =  new SousRubrique();
        $form = $this->createForm(SousRubriqueType::class, $sousRubrique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($sousRubrique);
            $em->flush();
            $this->addFlash('succees', 'La catégorie a bien été crée');
            return $this->redirectToRoute('app_admin_sousRubrique_index');
        }
        return $this->render('admin/sousRubrique/create.html.twig', [
            'form' => $form
        ]);


    }

    #[Route('/{id}/edit', name:'edit', requirements:['id' => Requirement::DIGITS])]
    public function edit(SousRubrique $sousRubrique,Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(SousRubriqueType::class, $sousRubrique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('succees', 'La catégorie a bien été modifiée');
            return $this->redirectToRoute('app_admin_sousRubrique_index');
        }
        return $this->render('admin/sousRubrique/edit.html.twig', [
            'sousRubrique' => $sousRubrique,
            'form' => $form
        ]);
    }

    #[Route('/{id}', name:'delete', methods:['DELETE'])]
    public function remove(SousRubrique $sousRubrique, EntityManagerInterface $em)
    {
        $em->remove($sousRubrique);
        $em->flush();
        $this->addFlash('success', 'La sousRubrique a bien été supprimée');
        return $this->redirectToRoute('app_admin_sousRubrique_index');

    }
}