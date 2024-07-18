<?php

namespace App\DataFixtures;

use App\Entity\Cercles;
use App\Entity\Communes;
use App\Entity\LieuNaissances;
use App\Entity\Regions;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class RegionsFixtures extends Fixture implements DependentFixtureInterface
{
    private $lieuCounter = 0;
    private $communeCounter = 0;
    private $cercleCounter = 0;

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($reg = 0; $reg <= 10; $reg++) {
            $region = new Regions();
            $region->setDesignation($faker->unique()->country());
            for ($cer = 0; $cer <= 15; $cer++) {
                $cercle = new Cercles();
                $cercle->setDesignation($faker->unique()->city());
                $cercle->setRegion($region);
                for ($com = 0; $com <= 10; $com++) {
                    $commune = new Communes();
                    $commune->setDesignation($faker->unique()->streetName());
                    $commune->setCercle($cercle);
                    for ($lie = 0; $lie <= 15; $lie++) {
                        $lieu = new LieuNaissances();
                        $lieu->setDesignation($faker->unique()->address);
                        $lieu->setCommune($commune);
                        $manager->persist($lieu);
                        $this->addReference('lieu_' . $this->lieuCounter, $lieu);
                        $this->lieuCounter++;
                    }
                    $manager->persist($commune);
                    $this->addReference('commune_' . $this->communeCounter, $commune);
                    $this->communeCounter++;
                }
                $manager->persist($cercle);
                $this->addReference('cercle_' . $this->cercleCounter, $cercle);
                $this->cercleCounter++;
            }
            $manager->persist($region);
            $this->addReference('region_' . $reg, $region);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DepartementsFixtures::class,
        ];
    }

}
