<?php

namespace App\Controller\Admin;
use App\Entity\Fournit;
use App\Form\FournitType;
use App\Repository\FournisseurRepository;
use App\Repository\FournitRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('admin/commande_fournisseur', name: 'app_admin_commande_fournisseur_')]
class FournitController extends AbstractController
{
    #[Route('/', name: 'index')]
     public function index(FournitRepository $fournitRepository/*, FournisseurRepository $fournisseurRepository, ProduitRepository $produitRepository*/): Response
    {
        $fournit = $fournitRepository->OrderByDate();
        return $this->render('admin/fournit/index.html.twig', [
            'fournis' => $fournit,
        ]);
    }
    #[Route('/create', name:'create')]
    public function create(Request $request, EntityManagerInterface $em)
    {
        $fournit = new Fournit();
        $form = $this->createForm(FournitType::class, $fournit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($fournit);
            $em->flush();
            $this->addFlash('success', 'L\'ajout de la commande dans la table a été effectué, n\'hésitez pas a utiliser éditer pour modifier l\'image.');
            return $this->redirectToRoute('app_admin_commande_fournisseur_index');
        }
        return $this->render('admin/fournit/create.html.twig' , [
            'form' => $form
        ]);
    }
}