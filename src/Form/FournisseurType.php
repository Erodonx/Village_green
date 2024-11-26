<?php

namespace App\Form;

use App\Entity\Fournisseur;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('type')
            ->add('product', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'by_reference' => false,
                'mapped' => true,
                'disabled' => true,
                'label' => 'Produits (Affichage uniquement, si vous voulez changer le fournisseur d\'un produit veuillez éditer le produit)',
                'required' => false,
            ])
            ->add('Sauvegarder',SubmitType::class,[

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fournisseur::class,
        ]);
    }
}
