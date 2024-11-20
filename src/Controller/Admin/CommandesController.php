<?php

namespace App\Controller\Admin;

use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommandesController extends AbstractController
{
    #[Route('admin/commandes/', name: 'app_admin_commandes_index')]
    public function index(CommandeRepository $repo, Request $request): Response
    {
        $sort = $request->query->get('sort', 'popularity'); 
        $commandes = $repo->findAll();
        $produits = $repo->findByFilters($sort);
        return $this->render('admin/commandes/index.html.twig', [
            'controller_name' => 'IndexController',
            'commandes' => $produits,
        ]);
    }
}