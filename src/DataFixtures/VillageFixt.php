<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;

class VillageFixt extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $produit1 = new Produit();
        $produit1->setNom('Violon')
        ->setDescription('Un super violon avec les cordes bien bien tendues')
        ->setPrixHT(10.50)
        ->setImage('Violon.jpg')
        ->setStock(65);


        $manager->persist($produit1);
        $manager-> flush();

    }
}
