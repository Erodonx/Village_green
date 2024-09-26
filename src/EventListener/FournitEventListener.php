<?php

namespace App\EventListener;

use App\Entity\Fournit;
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

    public function __construct(FournitRepository $fournit,EntityManagerInterface $em) 
    {
        $this->fournit = $fournit;
        $this->em = $em;

    }
    
    public function postPersist(PostPersistEventArgs $event): void
    {
        // dd($event->getObject());
        if ($event->getObject() instanceof Fournit) {
            // dd("ok");
            $tab=$this->fournit->update_stock_produit(new DateTime("now"));
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
            foreach ($tab as $livraison)
            {
                if ($livraison->getProduit()->getStock()!=$total[$livraison->getProduit()->getId()])
                $livraison->getProduit()->setStock($total[$livraison->getProduit()->getId()]);
            }
        
            $this->em->flush();
        }
    }
}