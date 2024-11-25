<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutController extends AbstractController
{
    #[Route('/about/politique_de_confidentialite', name: 'app_about_politique_de_confidentialite')]
    public function Politique_de_confidentialite(): Response
    {
        return $this->render('about/politique.html.twig');
    }
    #[Route('about/mentions_legales', name:'app_about_mentions_legales')]
    public function mentions_legales(): Response
    {
        return $this->render('about/mentions_legales.html.twig');
    }
}
