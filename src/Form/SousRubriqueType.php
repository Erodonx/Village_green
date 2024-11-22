<?php

namespace App\Form;

use App\Entity\SousRubrique;
use App\Repository\ProduitRepository;
use App\Entity\Produit;
use App\Entity\Rubrique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SousRubriqueType extends AbstractType
{
    private $produitRepo;    
    public function __construct(ProduitRepository $produitRepo){
        $this->produitRepo = $produitRepo;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $manip=$_SERVER['REQUEST_URI'];
        if($manip[25]=='t')
        {
        $manip=substr($manip,20,strlen($manip));
        $i=0;
        do
        {
        $i=$i+1;
        }while($manip[$i]!='/');
        $manip=substr($manip,0,$i);
        $images = $this->produitRepo->findImagesByIdSR($manip);
        //dd($images);
        foreach($images as $liste)
        {
         $listeimage[$liste['image']] = $liste['image'];
        }
        if (empty($images))
        {
            $listeimage['Aucun produit relié a cette catégorie']='rajouter_des_produits_associés_a_cette_entite';
        }
        }else{
            $listimage = [];
            $listeimage['Editez l\'entité pour changer']='EDIT_REQUIRED';
        }
        //dd($listeimage);
        $builder
            ->add('nom')
            ->add('description')
            ->add('image', ChoiceType::class , [
                'choices' => [$listeimage],
            ])
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
