<?php

namespace App\Form;

use App\Entity\Events;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('lieu')
            ->add('date_event')
            ->add('pic_event1')
            ->add('pic_event2')
            ->add('pic_event3')
            ->add('pic_event4')
            ->add('participe_oui')
            ->add('participe_non')
            ->add('participe_pe')
            ->add('descript_event')
            ->add('users')
            ->add('associations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Events::class,
        ]);
    }
}
