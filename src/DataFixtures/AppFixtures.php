<?php

namespace App\DataFixtures;

use App\Entity\Voiture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $voiture = new Voiture();
        $voiture->setNom('Citroen C4 Grand Picasso');
        $voiture->setDescription('Une voiture familiale, idéale pour les longues trajets.');
        $voiture->setPrixQuotidien(40.0);
        $voiture->setPrixMensuel(900.0);
        $voiture->setPlaces(7);
        $voiture->setManuelle(true);
        $manager->persist($voiture); 
        
        $voiture2 = new Voiture();
        $voiture2->setNom('Audi Q7');
        $voiture2->setDescription('Un SUV de luxe avec beaucoup d\'espace et de confort.');
        $voiture2->setPrixQuotidien(80.0);
        $voiture2->setPrixMensuel(1300.0);
        $voiture2->setPlaces(7);
        $voiture2->setManuelle(true);
        $manager->persist($voiture2); 
        
        $voiture3 = new Voiture();
        $voiture3->setNom('Ford Galaxy');
        $voiture3->setDescription('Un monospace spacieux, parfait pour les familles nombreuses.');
        $voiture3->setPrixQuotidien(50.0);
        $voiture3->setPrixMensuel(700.0);
        $voiture3->setPlaces(7);
        $voiture3->setManuelle(true);
        $manager->persist($voiture3); 

        $manager->flush();
    }
}
