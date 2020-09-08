<?php

namespace App\Form;

use App\Entity\User;
use App\Form\ApplicationType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, $this->getConfiguration("Prénom", "Votre prénom ..."))
            ->add('lastname', TextType::class, $this->getConfiguration("Nom", "Votre nom de famille ..."))
            ->add('email', EmailType::class, $this->getConfiguration("Emai", "Votre émail ..."))
            ->add('picture',UrlType::class, $this->getConfiguration("Avatar", "Votre avatar ..."))
            ->add('hash', PasswordType::class, $this->getConfiguration("Mot de passe", "Choisissez votre mot de passe ..."))
            ->add('passwordConfirm', PasswordType::class, $this->getConfiguration("Confirmer votre mot de passe", "Veuillez confirmer votre mot de passe ..."))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Présentez vous ..."))
            ->add('description', TextareaType::class, $this->getConfiguration("Description détaillée", "Entrez une description plus complète ..."))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
