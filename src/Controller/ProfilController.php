<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use App\Repository\UserRepository;
use App\Repository\UtilisateurRepository;
use App\Security\HistoryVerifier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    private $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }
    #[Route('/profil', name: 'app_profil')]
    public function index(Security $security,CommandeRepository $commande): Response
    {
        if($this->getUser()!=null)
        {


        $this->denyAccessUnlessGranted('ROLE_USER');
        $identifiant = $this->getUser()->getUserIdentifier(); //-- ICI on récupère l'identifiant unique de l'utilisateur connecté 
        if($identifiant){
            $info = $this->userRepo->findOneBy(["email" =>$identifiant]); //<--- ICI on vérifie qu'on a bien un utilisateur dans la base de donnée qui a ce mail 
            $commandes=$commande->findByUtilisateur($info->getId());
        }
        return $this->render('profil/index.html.twig', [
            'informations' => $info,
            'commandes' => $commandes

        ]);
        }else{
            $this->addFlash('warning','Vous devez être authentifié pour accéder à cette page.');
            return $this->redirectToRoute('app_login');
        }
    }
}