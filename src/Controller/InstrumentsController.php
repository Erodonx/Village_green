<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InstrumentsController extends AbstractController
{
    #[Route('/instruments', name: 'app_instruments')]
    public function index(): Response
    {
        return $this->render('instruments/index.html.twig', [
            'controller_name' => 'InstrumentsController',
        ]);
    }
}
