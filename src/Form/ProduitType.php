<?php

namespace App\Form;

use App\Entity\SousRubrique;
use App\Entity\Fournisseur;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('prix_HT')
            ->add('image', TextType::class,[
                'disabled' => true,
                'label' => 'nom de l\'image',
            ])
            ->add('imageFile', FileType::class, [
                'required' => false
            ])
            ->add('stock', TextType::class,[
                'disabled' => true,
                'required' => false,
            ])
            ->add('sousRubrique', EntityType::class, [
                'class' => SousRubrique::class,
                'choice_label' => 'nom',
                'required' => false
            ])
            ->add('Fournisseur', EntityType::class, [
                'class' => Fournisseur::class,
                'choice_label' => 'nom',
            ])
            ->add('save',SubmitType::class, [
                'label' => 'Sauvegarder les changements' ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
