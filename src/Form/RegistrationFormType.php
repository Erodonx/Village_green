<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email', EmailType::class, [
                'label' => 'Adresse mail',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une adresse mail'
                    ])
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
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
            ->add('numero_mobile', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez remplir ce champ',
                    ]),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Le numéro de téléphone doit se composer de {{ limit }} chiffres',
                        'max' => 10,
                        'maxMessage' => 'Le numéro de téléphone doit se composer de {{ limit }} chiffres',
                        'exactMessage' => 'Le numéro de téléphone doit se composer de {{ limit }} chiffres',
                    ])
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'J\'accepte les conditions d\'utilisation',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions d\'utilisation',
                    ]),
                ],
            ])
            ->add('code_postal', TextType::class, [
                'label' => 'Code postal',
                'required' => false,
                'constraints' => [
                new Length([
                    'min' => 5,
                    'max' => 5,
                    'exactMessage' => 'Le code postal doit se composer de {{ limit }} chiffres', ])
                ],
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'required' => false,
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
                'required' => false,
            ])
            ->add('pays', CountryType::class, [
                'placeholder' => 'Veuillez selectionner un pays',
                'required' => false
            ])
            ->add('coefficient',HiddenType::class, [
                'data' => 1,
            ])
            ->add('reduction', HiddenType::class, [
                'data' => 1,
            ])
            ->add('save',SubmitType::class, [
                'label' => 'S\'enregistrer' ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
