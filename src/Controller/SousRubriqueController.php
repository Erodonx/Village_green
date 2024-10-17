<?php

namespace App\Controller;

use App\Repository\RubriqueRepository;
use App\Repository\SousRubriqueRepository;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sousRubrique', name: 'app_sousRubrique_')]
class SousRubriqueController extends AbstractController
{
    #[Route('/{id}', name : 'show', requirements:['id' => Requirement::DIGITS])]
    public function show_sr(SousRubriqueRepository $srubriqueRepository,$id, RubriqueRepository $rubriqueRepository)
    {
        $rubriques = $rubriqueRepository->findAll();
        $srubrique = $srubriqueRepository->findById($id);
        if(!isset($srubrique[0]))
        {
         return $this->redirectToRoute('home');
        }
        $total = $srubrique[0]->getProduits()->count();
        return $this ->render('sous_rubrique/index.html.twig',[
            'controller_name' => 'index',
            'srubrique' => $srubrique,
            'total' => $total,
            'rubriques' => $rubriques
        ]);
        
    }
}
