<?php

namespace App\Controller;

use App\Entity\Requete;
use App\Form\RequeteType;
use App\Repository\RequeteRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/profil/requete", name: 'app_requete_')]
class RequeteController extends AbstractController
{
    private $userRepo;

    public function __construct(UserRepository $userRepo){
        $this->userRepo = $userRepo;
    }   
    #[Route('/', name: 'index', requirements:['idC' => Requirement::DIGITS , 'idE' => Requirement::DIGITS])]
    public function index(RequeteRepository $requete): Response
    {
        if ($this->getUser()->getUserIdentifier()==null)
        {
         $this->addFlash('warning','Vous devez être authentifié pour accéder à cette page.');
         $this->redirectToRoute('app_login');
        }else
        {
        $info = $this->userRepo->findOneBy(["email" =>$this->getUser()->getUserIdentifier()]);
        $Client=false;
        $Employe=false;
        foreach ($info->getRoles() as $roles)
        {
            if($roles=='ROLE_USER')
            {
                $Client=true;
            }
            if($roles=='ROLE_EMPLOYE')
            {
                $Employe=true;
            }
        }
        if($Client==true&&$Employe==false)
        {
        $requetes=$requete->findByClient2($info->getId());
        $type = 'client';
        }else
        {
        $requetes=$requete->findByEmploye($this->getUser());
        $type = 'employe';
        }
        
        return $this->render('/profil/requete/index.html.twig', [
            'controller_name' => 'RequeteController',
            'requetes' => $requetes,
            'type' => $type
        ]);
    }
    }
    #[Route('/create', name: 'app_requete_create', requirements:['idC' => Requirement::DIGITS , 'idE' => Requirement::DIGITS])]
    public function create(EntityManagerInterface $em, HttpFoundationRequest $request)
    {
        $requete = new Requete();
        $form = $this->createForm(RequeteType::class, $requete);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $info = $this->userRepo->findOneBy(["email" =>$this->getUser()->getUserIdentifier()]);
            $requete->setEmployeMess($info->getEmployeCharge());
            $requete->setClient($info);
            $em->persist($requete);
            $em->flush();
            $this->addFlash('success', 'La création de la requête a été effectuée, veuillez maintenant en saisir le contenu.');
            return $this->redirectToRoute('app_requete_index');
        }
        return $this->render('/profil/requete/create.html.twig', [
            'requete' => $requete,
            'form' => $form
        ]);
    }
}
