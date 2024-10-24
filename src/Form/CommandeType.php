<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //->add('dateCommande', null, [
            //    'widget' => 'single_text',
            //])
            //->add('montantCommandeHT')
            //->add('montantCommandeTTC')
            ->add('adresseFacturation',TextType::class ,['label' => 'Adresse de facturation'])
            ->add('villeFacturation',TextType::class ,['label' => 'Ville de facturation'])
            ->add('adresseLivraison',TextType::class ,['label' => 'Adresse de livraison'])
            ->add('villeLivraison',TextType::class ,['label' => 'Ville de livraison'])
            ->add('moyenDePaiement',ChoiceType::class ,['label' => 'Méthode de paiement','constraints'=>[new NotBlank([
                'message' => 'Veuillez sélectionner la méthode de paiement'
            ])], 'choices' => [
                'Veuillez selectionner le mode de paiement ci-dessous :' =>null,
                'VISA' => 'VISA',
                'PAYPAL' => 'PAYPAL',
                'LA CARTE DE MAMAN' => 'LA CARTE DE MAMAN'
            ]])
            ->add('typeLivraison',ChoiceType::class,['label' => 'Type de livraison', 'mapped' => false, 'constraints' => [new NotBlank([
                'message' => 'Veuillez choisir un mode de livraison',
            ])], 'choices' => [

                'Veuillez selectionner le type de livraison :' => null,
                'Relais colis' => 'Relais colis',
                'A domicile' => 'A domicile'
                ]
            ])
            ->add('CGU_validation',  CheckboxType::class,['label' => 'J\'accepte les conditions générales d\'utilisation' , 'mapped' => false] )
            //->add('etatLivraison')
            //->add('reduction')
            //->add('utilisateur', EntityType::class, [
            //    'class' => user::class,
            //    'choice_label' => 'id',
            //])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
