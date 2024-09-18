<?php

namespace App\DataFixtures;

use App\Entity\Fournisseur;
use App\Entity\Fournit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use DateTime;

class VillageFixt extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $Rubrique1=new Rubrique();
        $Rubrique1->setNom('Instruments traditionnels')
                  ->setDescription('Pour les hipsters qui passent leur temps à dire : "C\'ETAIT MIEUX AVANT!"');
        $manager->persist($Rubrique1);

        $sousRubrique1 = new SousRubrique();
        $sousRubrique1->setNom('Instruments de folklore')
                      ->setDescription('Ahlala gogo zozo')
                      ->setRubrique($Rubrique1);
        $manager->persist($sousRubrique1);
        $produit1 = new Produit();
        $produit1->setNom('Tambour')
        ->setDescription('TAMTAMTAMTAM')
        ->setPrixHT(10.50)
        ->setImage('tambour-66eac2191b2f9399319867.png')
        ->setStock(1000)
        ->setSousRubrique($sousRubrique1);
        $manager->persist($produit1);


        $fournisseur1 = new Fournisseur();
        $fournisseur1->setNom("GROBRIGAND");
        $fournisseur1->setTypeFournisseur("Constructeur");
        $manager->persist($fournisseur1);

        $fournit1 = new Fournit();
        $fournit1->setQuantiteLivree(1000);
        $fournit1->setDateLivraison(new DateTime("now"));
        $fournit1->setProduit($produit1);
        $fournit1->setFournisseur($fournisseur1);
        $manager->persist($fournit1);

        $manager-> flush();

    }
}
