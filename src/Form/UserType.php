<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('roles', ChoiceType::class, [
            'choices' => [
                'Utilisateur' => 'ROLE_USER',
                'Employe' => 'ROLE_EMPLOYE',
                'Administrateur' => 'ROLE_ADMIN',
                'Professionnel' => 'ROLE_CLIENT_PROFESSIONNEL'
            ],
            'expanded' => true,
            'multiple' => true,
            'label' => 'Rôles' 
        ])
            ->add('employeCharge', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er): QueryBuilder {
                    $role =  'ROLE_EMPLOYE';
        return $er->createQueryBuilder('u')
            ->where('u.roles LIKE :roles')
            ->setParameter('roles', '%"'.$role.'"%');
    },
                'label' => 'Commercial référent',
                'choice_label' => 'email',
                'required' => false
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse mail',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une adresse mail'
                    ])
                ]
            ])
            ->add('nom')
            ->add('prenom')
            ->add('password',PasswordType::class, [
                'mapped' => false,
                'label' => 'Mot de passe',
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe devrait comporter au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('adresse')
            ->add('code_postal')
            ->add('pays', CountryType::class, [
                'placeholder' => 'Veuillez selectionner un pays',
                'required' => false
            ])
            ->add('ville')
            ->add('numero_mobile')
            ->add('num_siret',TextType::class,[
                'required' => false,
            ])
            ->add('save',SubmitType::class, [
                'label' => 'Sauvegarder les changements' ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}