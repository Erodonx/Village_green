<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Repository\RubriqueRepository;
use App\Repository\SousRubriqueRepository;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/rubrique', name: 'app_rubrique_')]
class RubriqueController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(RubriqueRepository $rubriquerepository,ProduitRepository $prod): Response
    {
     $rubriques = $rubriquerepository->findAll();
    /*$total = array();
     $n=0;
     foreach ($rubriques as $rubrique)
     {
        $total[$n]=0;
        foreach ($rubrique->getSousrubrique() as $sousrubrique)
        {
        $total[$n]= $total[$n] + $sousrubrique->getProduits()->count();
        }
     $n= $n+1;
     }
     $randtotal = array();
     $i = 0 ;
     while($i < count($total))
     {
        foreach ($total as $number)
        $randtotal[$i]= 0;
        $randtotal[$i] = rand(0,$number);
        $i = $i+1;
     }*/
    $total = count($rubriques);
        return $this->render('rubrique/index.html.twig', [
            'controller_name' => 'rubriqueController',
            'rubriques' => $rubriques,
            'total' => $total
        //'randtotal' => $randtotal*/
            
        ]);
    }
    #[Route('/{id}', name:'show',requirements:['id' => Requirement::DIGITS])]
    public function show(SousRubriqueRepository $srubriqueRepository,$id)
    {
        $srubriques=$srubriqueRepository->findBy([
            "rubrique" => $id
        ]);
        if(!isset($srubriques[0]))
        {
         return $this->redirectToRoute('app_rubrique_index');   
        }
        $total = 0;
        foreach ($srubriques as $sousrubrique)
        {
         $total = $total + $sousrubrique->getProduits()->count();
         
        }
    return $this->render('rubrique/show.html.twig',[
        'controller_name' => 'show',
        'srubriques' => $srubriques,
        'total' => $total
    ]);
    }
    }
