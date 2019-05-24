<?php

namespace App\Form;

use App\Entity\Activites;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ActivitesType extends AbstractType
{
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleActivite', TextType::class, [ 'label' => 'titre de l\'activité'])
            ->add('decriptActivite', TextType::class, [ 'label' => 'Description de l\'activité'])
            ->add('imageFile1', VichFileType::class, [ 'label' => 'image activité 1'])
            ->add('imageFile2', VichFileType::class)
            ->add('imageFile3', VichFileType::class)
            ->add('users')
            ->add('associations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activites::class,
        ]);
    }   
}
