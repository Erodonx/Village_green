<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('admin/commandes_editables', name: 'app_admin_commandes_editables_')]
class CommandesEditablesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CommandeRepository $repo, Request $request): Response
    {
        $commandes = $repo->findAll();
        return $this->render('admin/commandes_editables/index.html.twig', [
            'controller_name' => 'IndexController',
            'commandes' => $commandes,
        ]);
    }
    #[Route('/{id}', name: 'delete', methods:['DELETE'])]
    public function remove(Commande $commande, EntityManagerInterface $em)
    {
        $em->remove($commande);
        $em->flush();
        $this->addFlash('success', 'La commande a bien été supprimée');
        return $this->redirectToRoute('app_admin_commandes_editables_index');
    }
}