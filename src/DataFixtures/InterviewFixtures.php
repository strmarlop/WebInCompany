<?php

namespace App\DataFixtures;

use App\Entity\Interview;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;


class InterviewFixtures extends Fixture implements DependentFixtureInterface
{
    public const INTERVIEWS = [
        ['job' => 'Dev web', 'company' => 'Google', 'statut' => 'Meeting HR', ], //'date' => '23-05-2010'
        ['job' => 'Dev backend', 'company' => 'Wild Code School', 'statut' => 'Meeting HR', ], //'date' => '30-05-2010'
        ['job' => 'Dev Symfony', 'company' => 'Web In Company', 'statut' => 'Technical Test', ], //'date' => '07-07-2012'
        ['job' => 'Dev PHP', 'company' => 'BlaBlaCar', 'statut' => 'Meeting CTO', ], //'date' => '05-11-2010'
        ['job' => 'Dev fullstack', 'company' => 'SensioLabs', 'statut' => 'Permanent Contract'], //'date' => '23-08-2010'
    ];


    public function load(ObjectManager $manager): void
    {
        foreach (self:: INTERVIEWS as $key=>$interviewInfo)
        {
            $interview = new Interview();
            $interview->setJob($interviewInfo['job']);
            $interview->setCompany($interviewInfo['company']);
            // $interview->setDate($interviewInfo['date']);
            $interview->setStatut($this->getReference('statut_' . ($interviewInfo['statut'])));
            $interview->setOwner($this->getReference('user_' . UserFixtures::USERS[array_rand(UserFixtures::USERS)]['email']));

            $manager->persist($interview);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          StatutFixtures::class,
          UserFixtures::class,

        ];
    }
}
