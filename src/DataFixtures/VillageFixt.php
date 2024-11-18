<?php

namespace App\DataFixtures;

use App\Entity\Commande;
use App\Entity\Detail;
use App\Entity\DetailLivraison;
use App\Entity\Fournisseur;
use App\Entity\Fournit;
use App\Entity\Livraison;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use App\Entity\User;
use DateTime;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class VillageFixt extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
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
                 ->setImage('Satincharcoal.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique4)
                 ->setFournisseur($fournisseur1);
        $manager->persist($produit8);

        $rubrique3 = new Rubrique();
        $rubrique3->setNom('Pianos et clavier')
                  ->setDescription('Pour séduire la demoiselle avec un valse en si bémol')
                  ->setImage('YamahaGB.png');
        
        $manager->persist($rubrique3);

        $sousRubrique5 = new SousRubrique();
        $sousRubrique5->setNom('Pianos à Queue')
                      ->setDescription('Vous placez trop de confiance chez nos livreurs.')
                      ->setRubrique($rubrique3);
        $manager->persist($sousRubrique5);

        $produit9 = new Produit();
        $produit9 ->setNom('Yamaha GB1 K SC3 PE Grand Piano')
                  ->setDescription('Piano à queue silencieux, équipé du système silencieux SC3. 3 pédales (pédale centrale pour maintien de la tonalité). Dimensions : Longueur: 151 cm, Largeur: 146 cm, Hauteur: 99 cm, Poids : 265 kg')
                 ->setPrixHT(16690)
                 ->setImage('YamahaGB.png')
                 ->setStock(0)
                 ->setSousRubrique($sousRubrique5)
                 ->setFournisseur($fournisseur3);
        $manager-> persist($produit9);

        $produit10 = new Produit();
        $produit10->setNom('Kawai GL 10 E/P Grand Piano ')
                  ->setDescription('Piano à queue, mécanique Millennium III avec pièces en ABS Styran. Pédale sostenuto , têtes des marteaux avec feutre. Couvre clavier à fermeture lente ')
                  ->setPrixHT(16690)
                  ->setImage('KawaiGL.png')
                  ->setStock(0)
                  ->setSousRubrique($sousRubrique5)
                  ->setFournisseur($fournisseur2);
        $manager->persist($produit10);

        $sousRubrique6 = new SousRubrique();
        $sousRubrique6->setNom('Synthétiseurs, Workstations et Samplers')
                      ->setDescription('A cheval entre tradition et modernité.')
                      ->setRubrique($rubrique3);
        $manager->persist($sousRubrique6);

        $produit11 = new Produit();
        $produit11->setNom('Roland GAIA 2')
                  ->setDescription('Clavier 37 touches. Filtre multimode (passe-bas, passe-bande, passe-haut) avec résonance, contrôle Filter-Drive et pente sélectionnable (-12 dB, -18 dB, -24 dB)')
                  ->setPrixHT(736)
                  ->setImage('RolandG.png')
                  ->setStock(0)
                  ->setSousRubrique($sousRubrique6)
                  ->setFournisseur($fournisseur1);
        $manager->persist($produit11);

        $produit12 = new Produit();
        $produit12->setNom('AKAI Professional Force')
                  ->setDescription('Séquenceur à pas, fonction Clip-Launch, échantillonneur et moteur de synthétiseur dans un seul appareil')
                  ->setPrixHT(1059)
                  ->setImage('AkaiPF.png')
                  ->setStock(0)
                  ->setSousRubrique($sousRubrique6)
                  ->setFournisseur($fournisseur2);
        $manager->persist($produit12);
        
        $fournit1 = new Fournit();
        $fournit1->setQuantiteLivree(300);
        $fournit1->setDateLivraison(new DateTime("now"));
        $fournit1->setProduit($produit1);
        $fournit1->setFournisseur($produit1->getFournisseur());
        $manager->persist($fournit1);

        $fournit2 = new Fournit();
        $fournit2->setQuantiteLivree(250);
        $fournit2->setDateLivraison(new DateTime("now"));
        $fournit2->setProduit($produit2);
        $fournit2->setFournisseur($produit2->getFournisseur());
        $manager->persist($fournit2);

        $fournit3 = new Fournit();
        $fournit3->setQuantiteLivree(275);
        $fournit3->setDateLivraison(new DateTime("now"));
        $fournit3->setProduit($produit3);
        $fournit3->setFournisseur($produit3->getFournisseur());
        $manager->persist($fournit3);

        $fournit4 = new Fournit();
        $fournit4->setQuantiteLivree(225);
        $fournit4->setDateLivraison(new DateTime("now"));
        $fournit4->setProduit($produit4);
        $fournit4->setFournisseur($produit4->getFournisseur());
        $manager->persist($fournit4);

        $fournit5 = new Fournit();
        $fournit5->setQuantiteLivree(325);
        $fournit5->setDateLivraison(new DateTime("now"));
        $fournit5->setProduit($produit5);
        $fournit5->setFournisseur($produit5->getFournisseur());
        $manager->persist($fournit5);
        
        $fournit6 = new Fournit();
        $fournit6->setQuantiteLivree(350);
        $fournit6->setDateLivraison(new DateTime("now"));
        $fournit6->setProduit($produit6);
        $fournit6->setFournisseur($produit6->getFournisseur());
        $manager->persist($fournit6);

        $fournit7 = new Fournit();
        $fournit7->setQuantiteLivree(375);
        $fournit7->setDateLivraison(new DateTime("now"));
        $fournit7->setProduit($produit7);
        $fournit7->setFournisseur($produit7->getFournisseur());
        $manager->persist($fournit7);

        $fournit8 = new Fournit();
        $fournit8->setQuantiteLivree(400);
        $fournit8->setDateLivraison(new DateTime("now"));
        $fournit8->setProduit($produit8);
        $fournit8->setFournisseur($produit8->getFournisseur());
        $manager->persist($fournit8);

        $fournit9 = new Fournit();
        $fournit9->setQuantiteLivree(225);
        $fournit9->setDateLivraison(new DateTime("now"));
        $fournit9->setProduit($produit9);
        $fournit9->setFournisseur($produit9->getFournisseur());
        $manager->persist($fournit9);

        $fournit10 = new Fournit();
        $fournit10->setQuantiteLivree(550);
        $fournit10->setDateLivraison(new DateTime("now"));
        $fournit10->setProduit($produit10);
        $fournit10->setFournisseur($produit10->getFournisseur());
        $manager->persist($fournit10);

        $fournit11 = new Fournit();
        $fournit11->setQuantiteLivree(750);
        $fournit11->setDateLivraison(new DateTime("now"));
        $fournit11->setProduit($produit11);
        $fournit11->setFournisseur($produit11->getFournisseur());
        $manager->persist($fournit11);

        $fournit12 = new Fournit();
        $fournit12->setQuantiteLivree(375);
        $fournit12->setDateLivraison(new DateTime("now"));
        $fournit12->setProduit($produit12);
        $fournit12->setFournisseur($produit12->getFournisseur());
        $manager->persist($fournit12);


        $date = new DateTime("now");
        $date->modify('+1 month');
        $fournit9 = new Fournit();
        $fournit9->setQuantiteLivree(25);
        $fournit9->setDateLivraison($date);
        $fournit9->setProduit($produit8);
        $fournit9->setFournisseur($fournisseur1);
        $manager->persist($fournit9);

        $user = new User();
        $user->setEmail('admin@afpa.fr');

        $password = $this->hasher->hashPassword($user, 'admin');
        $user->setPassword($password);
        $user->setNom('admin');
        $user->setPrenom('admin');
        $user->setNumeroMobile('0660066006');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setCoefficient('1');
        $manager->persist($user);

        $user1 = new User();
        $user1->setEmail('brigand@afpa.fr');

        $password = $this->hasher->hashPassword($user, 'brigand');
        $user1->setPassword($password);
        $user1->setNom('brig');
        $user1->setPrenom('and');
        $user1->setRoles(['ROLE_EMPLOYE']);
        $user1->setNumeroMobile('0660066006');
        $user1->setCoefficient('1');
        $manager->persist($user1);
        $manager->flush();

        $user2 = new User();
        $user2->setEmail('robert@afpa.fr');

        $password = $this->hasher->hashPassword($user, 'robert');
        $user2->setPassword($password);
        $user2->setNom('Duplan');
        $user2->setPrenom('Robert');
        $user2->setNumeroMobile('0660066006');
        $user2->setCoefficient('1');
        $user2->setEmployeCharge($user1);
        $manager->persist($user2);
        $manager->flush();

        $user3 = new User();
        $user3->setEmail('Stanislas@afpa.fr');

        $password = $this->hasher->hashPassword($user, 'stanislas');
        $user3->setPassword($password);
        $user3->setNom('Charkov');
        $user3->setPrenom('Stanislas');
        $user3->setNumeroMobile('0660066006');
        $user3->setCoefficient('1');
        $user3->setEmployeCharge($user1);
        $manager->persist($user3);
        $manager->flush();

        $dateLiv= new DateTime("now");
        $dateLiv->modify("+3 days");
        
        $commande = new Commande();
        $livraison = new Livraison();
        $commande->setUser($user3);
        $detail = new Detail();
        $detailLiv = new DetailLivraison();
        $produit = $produit1;
        $detail->setProduit($produit);
        $detailLiv->setProduit($produit);
        $detail->setQuantiteCommandee(4);
        $detailLiv->setQuantite(4);
        $detailLiv->setDateLivraison($dateLiv);
        $commande->addDetail($detail);
        $livraison->addDetailLivraison($detailLiv);
        $detailLiv->setLivraison($livraison);
        $livraison->setNom("Relais colis");
        $total=$produit->getPrixHT()*4;
        $manager->persist($detail);
        $manager->persist($detailLiv);
        $commande->setMontantCommandeHT($total);
        $commande->setMontantCommandeTTC($total*1.20);
        $commande->setAdresseFacturation('12 rue du Général de Gaulle');
        $commande->setVilleFacturation('Amiens');
        $commande->setAdresseLivraison('12 rue du Général de Gaulle');
        $commande->setVilleLivraison('Amiens');
        $commande->setReduction('0');
        $commande->setMoyenDePaiement('VISA');
        $commande->setDateCommande(new DateTime("now"));
        
        $commande->setEtatLivraison('Commande en cours de livraison');
        $livraison->setCommande($commande);
        $manager->persist($commande);
        $manager->persist($livraison);

        $commande1 = new Commande();
        $livraison1 = new Livraison();
        $commande1->setUser($user3);
        $detail1 = new Detail();
        $detailLiv1 = new DetailLivraison();
        $produit = $produit5;
        $detail1->setProduit($produit);
        $detailLiv1->setProduit($produit);
        $detail1->setQuantiteCommandee(4);
        $detailLiv1->setQuantite(4);
        $detailLiv1->setDateLivraison($dateLiv);
        $detailLiv1->setLivraison($livraison1);
        $commande1->addDetail($detail1);
        $livraison1->addDetailLivraison($detailLiv1);
        $livraison1->setNom("Relais colis");
        $total=$produit->getPrixHT()*4;
        $manager->persist($detail1);
        $manager->persist($detailLiv1);
        $commande1->setMontantCommandeHT($total);
        $commande1->setMontantCommandeTTC($total*1.20);
        $commande1->setAdresseFacturation('12 rue du Général de Gaulle');
        $commande1->setVilleFacturation('Amiens');
        $commande1->setAdresseLivraison('12 rue du Général de Gaulle');
        $commande1->setVilleLivraison('Amiens');
        $commande1->setReduction('0');
        $commande1->setMoyenDePaiement('VISA');
        $commande1->setDateCommande(new DateTime("now"));
        
        $commande1->setEtatLivraison('Commande en cours de livraison');
        $livraison1->setCommande($commande1);
        $manager->persist($commande1);
        $manager->persist($livraison1);

        $commande2 = new Commande();
        $livraison2 = new Livraison();
        $commande2->setUser($user3);
        $detail2 = new Detail();
        $detailLiv2 = new DetailLivraison();
        $produit = $produit3;
        $detail2->setProduit($produit);
        $detailLiv2->setProduit($produit);
        $detail2->setQuantiteCommandee(4);
        $detailLiv2->setQuantite(4);
        $detailLiv2->setDateLivraison($dateLiv);
        $commande2->addDetail($detail2);
        $detailLiv2->setLivraison($livraison2);
        $livraison2->addDetailLivraison($detailLiv2);
        $livraison2->setNom("Relais colis");
        $total=$produit->getPrixHT()*4;
        $manager->persist($detail2);
        $manager->persist($detailLiv2);
        $commande2->setMontantCommandeHT($total);
        $commande2->setMontantCommandeTTC($total*1.20);
        $commande2->setAdresseFacturation('12 rue du Général de Gaulle');
        $commande2->setVilleFacturation('Amiens');
        $commande2->setAdresseLivraison('12 rue du Général de Gaulle');
        $commande2->setVilleLivraison('Amiens');
        $commande2->setReduction('0');
        $commande2->setMoyenDePaiement('VISA');
        $commande2->setDateCommande(new DateTime("now"));
        
        $commande2->setEtatLivraison('Commande en cours de livraison');
        $livraison2->setCommande($commande2);
        $manager->persist($commande2);
        $manager->persist($livraison2);


        $manager-> flush();

    }
}
