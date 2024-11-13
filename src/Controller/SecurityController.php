<?php

namespace App\Controller;

use App\Form\ResetPasswordFormType;
use App\Form\ResetPasswordType;
use App\Service\JWTservice;
use App\Repository\UserRepository;
use App\Service\SendEmailService;
use Doctrine\ORM\EntityManagerInterface;
use JWTservice as GlobalJWTservice;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('home');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
    #[Route(path:'/mot-de-passe-oublie', name: 'app_mot_de_passe_oublie')]
    public function mot_de_passe_oublie(Request $request,UserRepository $repository, JWTservice $jwt, SendEmailService $mail) : Response
    {
        $form = $this->createForm(ResetPasswordType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid())
        {
            $user = $repository->findOneByEmail($form->get('email')->getData());
            if($user)
            {
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];
            $payload = [
                'user_id' => $user->getId()
            ];
            $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'));
            $url = $this->generateUrl('app_reinitialisation',['token' => $token],UrlGeneratorInterface::ABSOLUTE_URL);
            $mail->send(
                'mailer@your-domain.com',
                $user->getEmail(),
                'Récupération de mot de passe sur le site Village green',
                'password_reset',
                compact('user', 'url') // ['user' => $user, 'url'=>$url]
            );
            $this->addFlash('success', 'Email envoyé avec succès');
            return $this->redirectToRoute('app_login');
    
            }
            $this->addFlash('danger', 'Un problème est survenu');
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('security/mot_de_passe_oublie.html.twig', [
            'requestPassForm' => $form
        ]);
    }
    #[Route(path:'/mot-de-passe-oublie/{token}', name: 'app_reinitialisation')]
    public function reinitialisation($token,JWTService $jwt,UserRepository $Repository,Request $request,UserPasswordHasherInterface $passwordHasher,EntityManagerInterface $em) : Response
    {
    // On vérifie si le token est valide (cohérent, pas expiré et signature correcte)
    if($jwt->isValid($token) && !$jwt->isExpired($token) && $jwt->check($token, $this->getParameter('app.jwtsecret'))){
    // Le token est valide
    // On récupère les données (payload)
    $payload = $jwt->getPayload($token);
    
    
    // On récupère le user
    $user = $Repository->find($payload['user_id']);

    if($user){
        $form = $this->createForm(ResetPasswordFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setPassword(
                $passwordHasher->hashPassword($user, $form->get('password')->getData())
            );

            $em->flush();

            $this->addFlash('success', 'Mot de passe changé avec succès');
            return $this->redirectToRoute('app_login');
        }
        return $this->render('security/reinitialisation.html.twig', [
            'passForm' => $form->createView()
        ]);
    }
}
$this->addFlash('danger', 'Le token est invalide ou a expiré');
return $this->redirectToRoute('app_login');
}
    #[Route(path:'/api/login_check',name:'api_login_check', methods:'POST')]
    public function apiLogin()
    {
        $user = $this->getUser();
        return $this->json([
            'email' => $user->getUserIdentifier(),
            'roles' => $user->getRoles()
        ]);
    }
        
}