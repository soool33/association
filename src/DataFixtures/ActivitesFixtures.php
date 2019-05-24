<?php

namespace App\DataFixtures;

use App\Entity\Activites;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ActivitesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 10; $i++){
            $activites = new Activites();
            $activites->setTitleActivite("Titre de l'activité n°$i")
                    ->setDecriptActivite("<p>Description de l'activité n°$i</p>")
                    ->setPicActivite1("http://placehold.it/350x150");

            $manager->persist($activites);
        }

        $manager->flush();
    }
}
