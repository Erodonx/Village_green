<?php

namespace App\Controller\AApi;

use App\Entity\Produit;
use App\Entity\User;
use App\Repository\ProduitRepository;
use App\Repository\UserRepository;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class UserController extends AbstractController

{


    #[Route("/aapi/user")]
    public function index (UserRepository $repository)
    {
        $user = $repository->findAll();
        return $this->json($user, 200,[],[
            'groups' => ['user.index','user.show']
        ]);
         
    }
    #[Route("/aapi/user/{id}", requirements:['id' => Requirement::DIGITS])]
    public function show(User $user)
    {
        return $this->json($user, 200,[],[
            'groups' => ['user.index','user.show']
        ]);
         
    }
    
    
}