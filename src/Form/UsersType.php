<?php

namespace App\Form;

use App\Entity\Users;
use App\Form\UsersType;
use App\Entity\Activites;
use App\Entity\Association;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\PropertyInfo\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;


class UsersType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       // $asso = $this->getDoctrine()->getUser(); 
        //dump($asso); 

        $builder
            ->add('num_licence',IntegerType::class, [
                'label' => 'Numéro de licence',
            ])
            //->add('association')
            ->add('civilite', ChoiceType::class, [
                'label' => 'Choisir la civilité',
                'choices' => [
                    'Mr' => 'Monsieur',
                    'Mme' => 'Madame',
                ]
            ])
            ->add('nom_user', TextType::class, [
                'label' => 'Nom du Licencier',
            ])
            ->add('nom_fille', TextType::class, [
                'label' => 'Nom de jeune fille de la Licencier',
                'required' => false

            ])
            ->add('prenom_user', textType::class, [
                'label' => 'Prénom du Licencier',
            ])
            ->add('date_naissance', BirthdayType::class, [
                'label'=>'date de naissance'
            ])
            ->add('tel1', TextType::class, [
                'label' => 'Téléphone n°1',
            ])
            ->add('tel2', TextType::class, [
                'label' => 'Téléphone n°2',
            ])
            ->add('email_user', EmailType::class, [
                'label' => 'E-Mail du Licencier',
            ])
            ->add('rue', TextType::class, [
                'label' => 'Numéro et rue du Licencier',
            ])
            ->add('cp_user', IntegerType::class, [
                'label' => "Code Postal de l'adresse du Licencier",
            ])
            ->add('ville_user', TextType::class, [
                'label' => 'Ville du Licencier',
            ])
            ->add('activite_user', EntityType::class,[
                'label' => "Activité(s) du Licencier   **(plusieurs choix possible)",
                'class' => Activites::class,
                'multiple' => true
            ])
            ->add('role', ChoiceType::class, [ 
                'label' => 'Choisissez le role du licencié   **(un choix possible)',
                'choices' => [
                    'Pratiquant' => 'Pratiquant',
                    'Président' => 'Président',
                    'Vice-président' => 'Vice-président',
                    'Secrétaire' => 'Secrétaire',
                    'Vice-secrétaire' => 'Vice-Secrétaire',
                    'Trésorier' => 'Trésorier',
                    'Vice-Trésorier' => 'Vice-Trésorier',
                    'Cadre Technique Principal' => 'Cadre technique Principal',
                    'Cadre Technique Secondaire' => 'Cadre technique Secondaire',
                    'Membre du bureau' => 'Membre du bureau',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
