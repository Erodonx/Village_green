<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ReductionType;
use App\Repository\CommandeRepository;
use App\Repository\UserRepository;
use App\Repository\UtilisateurRepository;
use App\Security\HistoryVerifier;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/profil', name: 'app_profil_')]
class ProfilController extends AbstractController
{
    private $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }
    #[Route('/', name:'index')]
    public function index(Security $security,CommandeRepository $commande): Response
    {
        if($this->getUser()!=null)
        {


        $this->denyAccessUnlessGranted('ROLE_USER');
        $identifiant = $this->getUser()->getUserIdentifier(); //-- ICI on récupère l'identifiant unique de l'utilisateur connecté 
        if($identifiant){
            $info = $this->userRepo->findOneBy(["email" =>$identifiant]); //<--- ICI on vérifie qu'on a bien un utilisateur dans la base de donnée qui a ce mail 
            $commandes=$commande->findByUser2($info->getId());
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

    #[Route('/edit/{id}', name:'edit', requirements:['id' => Requirement::DIGITS])]
    public function edit(User $user, EntityManagerInterface $em,Request $request)
    {
     $this->denyAccessUnlessGranted('ROLE_EMPLOYE');
     $form = $this->createForm(ReductionType::class, $user);
     $form->handleRequest($request);
     if ($form->isSubmitted() && $form->isValid())
     {
         $em->flush();
         $this->addFlash('succees', 'La réduction a bien été appliquée');
         return $this->redirectToRoute('app_profil_index');
     }
     return $this->render('/profil/edit.html.twig', [
         'user' => $user,
         'form' => $form
     ]);
    }
}