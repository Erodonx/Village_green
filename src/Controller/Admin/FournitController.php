<?php

namespace App\Controller\Admin;
use App\Entity\Fournit;
use App\Form\FournitType;
use App\Entity\Produit;
use App\Repository\FournisseurRepository;
use App\Repository\FournitRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use PharIo\Manifest\Requirement;
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
            'fournit' => $fournit,
        ]);
    }
    #[Route('/create', name:'create')]
    public function create(Request $request, EntityManagerInterface $em,ProduitRepository $produit)
    {
        $fournit = new Fournit();
        $form = $this->createForm(FournitType::class, $fournit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $fournit->setFournisseur($fournit->getProduit()->getFournisseur());
            $em->persist($fournit);
            $em->flush();
            $this->addFlash('success', 'L\'ajout de la commande dans la table a été effectué.');
            return $this->redirectToRoute('app_admin_commande_fournisseur_index');
        }
        return $this->render('admin/fournit/create.html.twig' , [
            'form' => $form
        ]);
    }
    #[Route('/{id}/edit', name: 'edit', requirements: ['id' => Requirement::DIGITS])]
    public function edit(Fournit $fournit, Request $request, EntityManagerInterface $em)
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(FournitType::class, $fournit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->flush();
            $this->addFlash('success', 'La modification du produit concerné a été enregistrée.');
            return $this->redirectToRoute('app_admin_commande_fournisseur_index');
        }
        return $this->render('admin/fournit/edit.html.twig', [
            'fournit' => $fournit,
            'form' => $form
        ]);
    }
    #[Route('/{id}', name:'delete', methods:['DELETE'])]
    public function remove(Fournit $fournit, EntityManagerInterface $em)
    {
        $em->remove($fournit);
        $em->flush();
        $this->addFlash('success', 'La commande fournisseur a bien été supprimée');
        return $this->redirectToRoute('app_admin_commande_fournisseur_index');

    }
}
