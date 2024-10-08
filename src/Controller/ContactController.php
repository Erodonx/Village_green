<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $data = new ContactDTO();
        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            try{
            $mail = (new TemplatedEmail())
                ->to($data->service)
                ->from($data->email)
                ->subject('Demande de contact')
                ->htmlTemplate('emails/contact.html.twig')
                ->context(['data' => $data]);
            $mailer->send($mail);
            $this->addFlash('success','Votre email a bien été envoyé');
            return $this->redirectToRoute('app_contact');
        }catch(\Exception $e){
            $this->addFlash('danger','Impossible d\'envoyer votre email');
        }
   }
        return $this->render('contact/contact.html.twig', [
            'form' => $form,
        ]);
    }
}
