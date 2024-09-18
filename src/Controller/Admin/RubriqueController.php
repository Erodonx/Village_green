<?php

namespace App\Controller\Admin;

use App\Entity\Rubrique;
use App\Form\RubriqueType;
use App\Repository\RubriqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/rubrique', name: 'app_admin_rubrique_')]
class RubriqueController extends AbstractController
{


    #[Route(name: 'index')]
    public function index(RubriqueRepository $repository)
    {
        return $this->render('admin/rubrique/index.html.twig', [
            'rubriques' => $repository->findAll()
        ]);


    }

    #[Route('/create', name:'create')]
    public function create(Request $request, EntityManagerInterface $em)
    {
        $rubrique =  new Rubrique();
        $form = $this->createForm(RubriqueType::class, $rubrique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($rubrique);
            $em->flush();
            $this->addFlash('succees', 'La catégorie a bien été crée');
            return $this->redirectToRoute('app_admin_rubrique_index');
        }
        return $this->render('admin/rubrique/create.html.twig', [
            'form' => $form
        ]);


    }

    #[Route('/{id}/edit', name:'edit', requirements:['id' => Requirement::DIGITS])]
    public function edit(Rubrique $rubrique,Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(RubriqueType::class, $rubrique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('succees', 'La catégorie a bien été modifiée');
            return $this->redirectToRoute('app_admin_rubrique_index');
        }
        return $this->render('admin/rubrique/edit.html.twig', [
            'rubrique' => $rubrique,
            'form' => $form
        ]);
    }

    #[Route('/{id}', name:'delete', methods:['DELETE'])]
    public function remove(Rubrique $rubrique, EntityManagerInterface $em)
    {
        $em->remove($rubrique);
        $em->flush();
        $this->addFlash('success', 'La rubrique a bien été supprimée');
        return $this->redirectToRoute('app_admin_rubrique_index');

    }

}
