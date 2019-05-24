<?php

namespace App\Form;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options)
   {
       $builder

           ->add('association')
           ->add('roles')
       ;
   }

   public function getParent()
   {
       return 'FOS\UserBundle\Form\Type\RegistrationFormType';
   }

   public function configureOptions(OptionsResolver $resolver)
   {
       $resolver->setDefaults([
           'data_class' => User::class,
       ]);
   }
}