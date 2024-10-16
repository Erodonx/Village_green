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
        
        $fournisseur1 = new Fournisseur();
        $fournisseur1->setNom('GROBRIGAND');
        $fournisseur1->setType('Constructeur');
        $manager->persist($fournisseur1);

        $fournisseur2 = new Fournisseur();
        $fournisseur2->setNom('GPARESPECTELIMITATIONVITESSE')
                     ->setType('Constructeur');
        $manager->persist($fournisseur2);
        
        $fournisseur3 = new Fournisseur();
        $fournisseur3->setNom('CULQUIGRATTE')
                     ->setType('Constructeur');
        $manager->persist($fournisseur3);
        $Rubrique1=new Rubrique();
        $Rubrique1->setNom('Instruments traditionnels')
                  ->setDescription('Pour les hipsters qui passent leur temps à dire : "C\'ETAIT MIEUX AVANT!"')
                  ->setImage('Luthrenaissance.png');
        $manager->persist($Rubrique1);

        $sousRubrique1 = new SousRubrique();
        $sousRubrique1->setNom('Instruments de folklore')
                      ->setDescription('Pour les personnes qui veulent se la péter en soirée avec leur guitare.')
                      ->setRubrique($Rubrique1);
        $manager->persist($sousRubrique1);

        $produit1 = new Produit();
        $produit1->setNom('Luth')
        ->setDescription('7 coeurs, des incrustations magnifiques, manche corps et tête en lacewood.
        Chevilles en bois de coco')
        ->setPrixHT(555.50)
        ->setImage('Luthrenaissance.png')
        ->setStock(0)
        ->setSousRubrique($sousRubrique1)
        ->setFournisseur($fournisseur1);
        $manager->persist($produit1);

        $produit2 = new Produit();
        $produit2->setNom('Harpe celtique')
                 ->setDescription('36 cordes, 31 levier de demi-ton, corps en frêne, table en épicéa, cordes en nylon (clé d\'accordage et housse incluse)')
                 ->setPrixHT('998.0')
                 ->setImage('Harpeceltique.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique1)
                 ->setFournisseur($fournisseur2);
        $manager->persist($produit2);

        $sousRubrique2 = new SousRubrique();
        $sousRubrique2->setNom('Percussions Classiques')
                      ->setDescription('Pour ceux qui ont envie de faire du bruit et de tout casser')
                      ->setRubrique($Rubrique1);
        $manager->persist($sousRubrique2);

        $produit3 = new Produit();
        $produit3->setNom('Adams BDTV 32/24 Thomann Bass Drum')
                 ->setDescription('Diamètre: 32\'\' 
                 Profondeur: 24\'\'
                 Fût en acajou. ')
                 ->setPrixHT(1745.00)
                 ->setImage('Tambourthomann.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique2)
                 ->setFournisseur($fournisseur3);
        $manager->persist($produit3);
        
        $produit4 = new Produit();
        $produit4->setNom('Thomann THTX 3.0 Xylophone')
                 ->setDescription('Format de table
                 3 octaves
                 Cadre en bois
                 Housse avec sangles sac à dos, support et maillets inclus.')
                 ->setPrixHT(298.00)
                 ->setImage('Xylophonethomann.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique2)
                 ->setFournisseur($fournisseur3);
        $manager->persist($produit4);
        
        $Rubrique2 = new Rubrique();
        $Rubrique2->setNom('Batteries & Percussions')
                  ->setDescription('POUR CEUX QUI VEULENT CASSER LA BARAQUE')
                  ->setImage('MilleniumMX420.png');
        $manager->persist($Rubrique2);

        $sousRubrique3 = new SousRubrique();
        $sousRubrique3->setNom('Cymbales')
                      ->setDescription('Pour faire de la musique ou comme freezbee')
                      ->setRubrique($Rubrique2);
        $manager->persist($sousRubrique3);

        $produit5 = new Produit();
        $produit5->setNom('Thomann Wind Gong 45')
                 ->setDescription('Juste besoin d\'avoir l\'image pour avoir le son dans la tête')
                 ->setPrixHT(111.00)
                 ->setImage('Gongthomann.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique3)
                 ->setFournisseur($fournisseur3);
        $manager->persist($produit5);

        $produit6 = new Produit();
        $produit6->setNom('Paiste 2002 Classic 18" Crash')
                 ->setDescription('Je comprends rien aux instruments de musiques trop de termes savants compliqués')
                 ->setPrixHT(289.00)
                 ->setImage('Cymbalepaiste.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique3)
                 ->setFournisseur($fournisseur3);
        $manager->persist($produit6);

        $sousRubrique4= new SousRubrique();
        $sousRubrique4->setNom('Batteries Acoustiques')
                      ->setDescription('JE SUIS UN HOMME EN COLÈRE')
                      ->setRubrique($Rubrique2);
        $manager->persist($sousRubrique4);

        $produit7 = new Produit();
        $produit7->setNom('Millenium MX420 Studio Set BL')
                 ->setDescription('Version studio, très grosse caisse 20\'\'x16\'\'
                 Pour ceux qui veulent se la péter avec leur très très grosse caisse.')
                 ->setPrixHT(444.00)
                 ->setImage('MilleniumMX420.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique4)
                 ->setFournisseur($fournisseur1);
        $manager->persist($produit7);

        $produit8 = new Produit();
        $produit8->setNom('DW PDP CM7 Satin Charcoal B.')
                 ->setDescription('Fûts F.A.S.T. 100% érable
                 (Personnellement je préfère les fûts 100% bière...)')
                 ->setPrixHT(1498.00)
                 ->setImage('MilleniumMX420.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique4)
                 ->setFournisseur($fournisseur1);
        $manager->persist($produit8);
        
        
        $fournit1 = new Fournit();
        $fournit1->setQuantiteLivree(300);
        $fournit1->setDateLivraison(new DateTime("now"));
        $fournit1->setProduit($produit1);
        $fournit1->setFournisseur($fournisseur1);
        $manager->persist($fournit1);

        $fournit2 = new Fournit();
        $fournit2->setQuantiteLivree(250);
        $fournit2->setDateLivraison(new DateTime("now"));
        $fournit2->setProduit($produit2);
        $fournit2->setFournisseur($fournisseur2);
        $manager->persist($fournit2);

        $fournit3 = new Fournit();
        $fournit3->setQuantiteLivree(275);
        $fournit3->setDateLivraison(new DateTime("now"));
        $fournit3->setProduit($produit3);
        $fournit3->setFournisseur($fournisseur3);
        $manager->persist($fournit3);

        $fournit4 = new Fournit();
        $fournit4->setQuantiteLivree(225);
        $fournit4->setDateLivraison(new DateTime("now"));
        $fournit4->setProduit($produit4);
        $fournit4->setFournisseur($fournisseur3);
        $manager->persist($fournit4);

        $fournit5 = new Fournit();
        $fournit5->setQuantiteLivree(325);
        $fournit5->setDateLivraison(new DateTime("now"));
        $fournit5->setProduit($produit5);
        $fournit5->setFournisseur($fournisseur3);
        $manager->persist($fournit5);
        
        $fournit6 = new Fournit();
        $fournit6->setQuantiteLivree(350);
        $fournit6->setDateLivraison(new DateTime("now"));
        $fournit6->setProduit($produit6);
        $fournit6->setFournisseur($fournisseur3);
        $manager->persist($fournit6);

        $fournit7 = new Fournit();
        $fournit7->setQuantiteLivree(375);
        $fournit7->setDateLivraison(new DateTime("now"));
        $fournit7->setProduit($produit7);
        $fournit7->setFournisseur($fournisseur1);
        $manager->persist($fournit7);

        $fournit8 = new Fournit();
        $fournit8->setQuantiteLivree(400);
        $fournit8->setDateLivraison(new DateTime("now"));
        $fournit8->setProduit($produit8);
        $fournit8->setFournisseur($fournisseur1);
        $manager->persist($fournit8);


        $date = new DateTime("now");
        $date->modify('+1 month');
        $fournit9 = new Fournit();
        $fournit9->setQuantiteLivree(25);
        $fournit9->setDateLivraison($date);
        $fournit9->setProduit($produit8);
        $fournit9->setFournisseur($fournisseur1);
        $manager->persist($fournit9);

        $manager-> flush();

    }
}
