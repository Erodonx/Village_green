<?php

namespace App\Form;

use App\Entity\SousRubrique;
use App\Entity\Produit;
use App\Entity\Rubrique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SousRubriqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('image')
            ->add('produits', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'by_reference' => false,
                'required' => false
            ])
            ->add('rubrique', EntityType::class, [
                'class' => Rubrique::class,
                'choice_label' => 'nom',
                'by_reference' => true,
                'required' => false
            ])
            ->add('save',SubmitType::class, [
                'label' => 'Sauvegarder les changements' ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SousRubrique::class,
        ]);
    }
}
