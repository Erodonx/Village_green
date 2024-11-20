<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())   
        {
            $roles= $form->getData()->getRoles();
            $verif=0;
            foreach($roles as $role)
            {
            if($role=="ROLE_EMPLOYE"||$role=="ROLE_ADMIN")
            $verif=1;
            }
            if($verif==0)
            {
                $em->flush();
                $this->addFlash('success', 'La modification de l\'utilisateur concerné a été enregistrée.');
                return $this->redirectToRoute('app_admin_utilisateur_index');
            }
            else{
                $this->addFlash('warning','Vous ne pouvez pas définir un employé à la charge d\'un autre employé ou de l\'administrateur');
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
}