<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Form\ModifyUserProType;
use App\Form\UserEditType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/admin/utilisateur', name: 'app_admin_utilisateur_')]
class UserController extends AbstractController{


    #[Route('/', name: 'index')]
    public function index(UserRepository $repository)
    {

        return $this->render('admin/utilisateur/index.html.twig', [
            'user' => $repository->findAll()
        ]);


    }
    #[Route('/edit/{id}', name: 'edit', requirements:['id' => Requirement::DIGITS])]
    public function edit(User $user, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(UserEditType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())   
        {
            $roles= $form->getData()->getRoles();
            $EmployeCharge = $form->getData()->getEmployeCharge();
            $errorEmployeCharge=false;
            $errorRole=false;
            $rightRoleToSubmit=false;
            foreach($roles as $role)
            {
            if($role=="ROLE_EMPLOYE"||$role=="ROLE_ADMIN")
            {
             $errorRole=true;
            if(isset($EmployeCharge))          
            {
             $errorEmployeCharge=true;   
            }
            }
            if($role=="ROLE_CLIENT_PROFESSIONNEL")
            {
             $rightRoleToSubmit=true;
            }
            }
            if($errorEmployeCharge==true)
             {
                $this->addFlash('warning','Vous ne pouvez pas définir un employé à la charge de l\'administrateur ou d\'un employé');
                return $this->redirectToRoute('app_admin_utilisateur_index');
             }
            if($rightRoleToSubmit==false && isset($EmployeCharge))
            {
                $this->addFlash('warning','Vous ne pouvez pas définir un employé à la charge d\'un client n\'étant pas un client professionnel.');
                return $this->redirectToRoute('app_admin_utilisateur_index');
            }
            if($rightRoleToSubmit==false && !isset($EmployeCharge))
            {
                $em->flush();
                $this->addFlash('success', 'La modification de l\'utilisateur concerné a été enregistrée.');
                return $this->redirectToRoute('app_admin_utilisateur_index');
            }
            if($rightRoleToSubmit==true && $errorRole==false)
            {
                $em->flush();
                $this->addFlash('success', 'La modification de l\'utilisateur concerné a été enregistrée.');
                return $this->redirectToRoute('app_admin_utilisateur_index');
            }
            if($rightRoleToSubmit==true && $errorRole==true)
            {
                $this->addFlash('warning','Vous ne pouvez pas être un employé et avoir un rôle de client professionnel.');
                return $this->redirectToRoute('app_admin_utilisateur_index');
            }
        }
        return $this->render('admin/utilisateur/edit.html.twig', [
            'utilisateur' => $user,
            'form' => $form
        ]);
    }
    #[Route('/{id}', name:'delete', methods:['DELETE'])]
    public function remove(User $user, EntityManagerInterface $em)
    {
        $em->remove($user);
        $em->flush();
        $this->addFlash('success', 'L\'utilisateur a bien été supprimé');
        return $this->redirectToRoute('app_admin_utilisateur_index');

    }
    #[Route('/create', name:'create')]
    public function create(Request $request, EntityManagerInterface $em,UserPasswordHasherInterface $userPasswordHasher)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $user->setCoefficient(1);
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'L\'ajout de l\'utilisateur dans la base de données a été effectué');
            return $this->redirectToRoute('app_admin_utilisateur_index');
        }
        return $this->render('admin/utilisateur/create.html.twig' , [
            'form' => $form
        ]);
    }
}