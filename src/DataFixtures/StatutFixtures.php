<?php

namespace App\DataFixtures;

use App\Entity\Statut;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatutFixtures extends Fixture
{
    public const STATUTS = [
        'Meeting HR',
        'Technical Test',
        'Meeting CTO',
        'Permanent Contract'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::STATUTS as $key=> $step)
        {
            $statut = new Statut;
            $statut->setName($step);

            $manager->persist($statut);
            $this->addReference('statut_' . $step, $statut);
        }

        $manager->flush();
    }
}
