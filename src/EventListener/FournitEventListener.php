<?php

namespace App\EventListener;

use App\Entity\Fournit;
use App\Repository\CommandeRepository;
use App\Repository\DetailRepository;
use App\Repository\FournitRepository;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\PostPersistEventArgs;

#[AsDoctrineListener('postPersist'/*, 500, 'default'*/)]
class FournitEventListener
{
    private $fournit;
    private $em;
    private $details;

    public function __construct(FournitRepository $fournit,EntityManagerInterface $em,DetailRepository $details) 
    {
        $this->fournit = $fournit;
        $this->details = $details;
        $this->em = $em;

    }
    
    public function postPersist(PostPersistEventArgs $event): void
    {
        // dd($event->getObject());
        if ($event->getObject() instanceof Fournit) {
            // dd("ok");
            $tab=$this->fournit->update_stock_produit(new DateTime("now"));
            $tabdetails=$this->details->findAll();
            $total=array();
            foreach ($tab as $livraison)
            {
                if (!isset($total[$livraison->getProduit()->getId()]))
                {
                    $total[$livraison->getProduit()->getId()]=0;
                }
                $total[$livraison->getProduit()->getId()]=$total[$livraison->getProduit()->getId()]+$livraison->getQuantiteLivree();
                //$livraison->getProduit()->setStock($livraison->getProduit()->getStock()+$livraison->getQuantiteLivree());
            }

            foreach ($tabdetails as $detailscom)
            {
               if(!isset($total[$detailscom->getProduit()->getId()]))
               {
                $total[$detailscom->getProduit()->getId()]=0;
               }

               $total[$detailscom->getProduit()->getId()]=$total[$detailscom->getProduit()->getId()]-$detailscom->getQuantiteCommandee();
            }

            foreach ($tab as $livraison)
            {
                if ($livraison->getProduit()->getStock()!=$total[$livraison->getProduit()->getId()])
                $livraison->getProduit()->setStock($total[$livraison->getProduit()->getId()]);
            }
        
            $this->em->flush();
        }
    }
}