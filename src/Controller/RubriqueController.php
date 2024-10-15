<?php

namespace App\Controller;

use App\Repository\RubriqueRepository;
use App\Repository\SousRubriqueRepository;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/rubrique', name: 'app_rubrique_')]
class RubriqueController extends AbstractController
{
    #[Route('/rubrique/', name: 'index')]
    public function index(): Response
    {
        return $this->render('rubrique/index.html.twig', [
            'controller_name' => 'rubriqueController',
        ]);
    }
    #[Route('/{id}', name:'show',requirements:['id' => Requirement::DIGITS])]
    public function show(RubriqueRepository $rubriqueRepository,SousRubriqueRepository $srubriqueRepository,$id)
    {
        $srubrique=$srubriqueRepository->findBy([
            "rubrique" => $id
        ]);
    return $this->render('rubrique/show.html.twig',[
        'controller_name' => 'show',
        'srubrique' => $srubrique
    ]);
    }

}
