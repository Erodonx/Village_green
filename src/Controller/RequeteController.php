<?php

namespace App\Controller;

use App\Entity\ContenuRequete;
use App\Entity\Requete;
use App\Form\ContenuRequeteType;
use App\Form\RequeteType;
use App\Repository\ContenuRequeteRepository;
use App\Repository\RequeteRepository;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(RequeteRepository $requete,ContenuRequeteRepository $contenuRequete): Response
    {
        if ($this->getUser()==null)
        {
         $this->addFlash('warning','Vous devez être authentifié pour accéder à cette page.');
         return $this->redirectToRoute('app_login');
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
        if($info->getEmployeCharge()==null)
        {
         $this->addFlash('warning','Vous ne pouvez pas faire de requête sans avoir un commercial qui vous encadre.');
         return $this->redirectToRoute('app_profil_index');
        }
        $requetes=$requete->findByClient2($info->getId());
        $type = 'client';
        }else
        {
        $requetes=$requete->findByEmployeMess($this->getUser());
        $type = 'employe';
        }
        
        return $this->render('/profil/requete/index.html.twig', [
            'controller_name' => 'RequeteController',
            'requetes' => $requetes,
            'type' => $type
        ]);
    }

    }
    #[Route('/create', name: 'create')]
    public function create(EntityManagerInterface $em, Request $request)
    {
        if ($this->getUser()==null)
        {
         $this->addFlash('warning','Vous devez être authentifié pour accéder à cette page.');
         return $this->redirectToRoute('app_login');
        }else
        {
        $info = $this->userRepo->findOneBy(["email" =>$this->getUser()->getUserIdentifier()]);
        if($info->getEmployeCharge()==null)
        {
         $this->addFlash('warning','Vous ne pouvez pas faire de requête sans avoir un commercial qui vous encadre.');
         return $this->redirectToRoute('app_profil_index');
        }
        $requete = new Requete();
        $form = $this->createForm(RequeteType::class, $requete);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $_REQUEST['requete'];
            $info = $this->userRepo->findOneBy(["email" =>$this->getUser()->getUserIdentifier()]);
            $requete->setEmployeMess($info->getEmployeCharge());
            $requete->setClient($info);
            $contenu = new ContenuRequete();
            $contenu->setMessage($data['message']);
            $contenu->setAuteur($this->getUser());
            $contenu->setDateMessage(new DateTime("now"));
            $contenu->setRequete($requete);
            $em->persist($requete);
            $em->persist($contenu);
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
    #[Route('/{id}/create', name: 'create_message', requirements:['id' => Requirement::DIGITS])]
    public function createmessage(EntityManagerInterface $em, Request $request,RequeteRepository $requetes, Requete $requete,$id)
    {
        if ($this->getUser()==null)
        {
         $this->addFlash('warning','Vous devez être authentifié pour accéder à cette page.');
         return $this->redirectToRoute('app_login');
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
     $requete = $requetes->findById($id);
     $cli=$requete[0]->getClient();
     if($cli!=$this->getUser())
     {
        $this->addFlash('warning','Cette requête ne vous concerne pas');
        return $this->redirectToRoute('app_profil_index');
     }else
     {
     $messagerequete = new ContenuRequete();
     $form = $this->createForm(ContenuRequeteType::class, $messagerequete);
     $form->handleRequest($request);
     if ($form->isSubmitted() && $form->isValid())
     {
         $date = new DateTime("now");
         $messagerequete->setRequete($requete[0]);
         $messagerequete->setAuteur($this->getUser());
         $messagerequete->setDateMessage($date);
         $em->persist($messagerequete);
         $em->flush();
         $this->addFlash('success', 'Le contenu du premier message a été déposé.');
         return $this->redirectToRoute('app_requete_index');
     }
     return $this->render('/profil/requete/create.html.twig', [
         'messagerequete' => $messagerequete,
         'form' => $form
     ]);
    }
    }
    else{
        $requete = $requetes->findById($id);
        $emp=$requete[0]->getEmployeMess();
        if($emp!=$this->getUser())
        {
           $this->addFlash('warning','Cette requête ne vous concerne pas');
           return $this->redirectToRoute('app_profil_index');
        }else
        {
        $messagerequete = new ContenuRequete();
        $form = $this->createForm(ContenuRequeteType::class, $messagerequete);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $date = new DateTime("now");
            $messagerequete->setRequete($requete[0]);
            $messagerequete->setAuteur($this->getUser());
            $messagerequete->setDateMessage($date);
            $em->persist($messagerequete);
            $em->flush();
            $this->addFlash('success', 'Le contenu du premier message a été déposé.');
            return $this->redirectToRoute('app_requete_index');
        }
      }
    }
}
    return $this->render('/profil/requete/create.html.twig', [
    'messagerequete' => $messagerequete,
    'form' => $form
]);
}
#[Route('/{id}/show', name: 'show_message', requirements:['id' => Requirement::DIGITS])]
 public function show(RequeteRepository $requetes,$id)
 {
    if ($this->getUser()==null)
    {
     $this->addFlash('warning','Vous devez être authentifié pour accéder à cette page.');
     return $this->redirectToRoute('app_login');
    }else
    {
    $info = $this->userRepo->findOneBy(["email" =>$this->getUser()->getUserIdentifier()]);
    $requete = $requetes->findById($id);
    if(!isset($requete[0]))
    {
     return $this->redirectToRoute('app_profil_index');
    }
    $cli=$requete[0]->getClient();
    $emp=$requete[0]->getEmployeMess();
    if(($this->getUser()!=$cli)&&($this->getUser()!=$emp))
    {
        $this->addFlash('warning','Cette requête ne vous concerne pas');
        return $this->redirectToRoute('app_profil_index');   
    }else{
        return $this->render('/profil/requete/show.html.twig', [
            'requete' => $requete[0],
        ]);
    }
}
}
}