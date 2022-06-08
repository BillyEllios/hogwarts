<?php

namespace App\DataFixtures;

use App\Entity\Students;
use App\Service\BirthService;
use App\Service\HouseService;
use App\Service\NameService;
use App\Service\PhoneService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StudentsFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private NameService $nameService, private BirthService $birthService, private PhoneService $phoneService, private HouseService $houseService)
    {
        
    }

    public function getDependencies() {
        return [
            HousesFixtures::class
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $nbStudents = 50;

        for ($i = 0; $i < $nbStudents; $i++) {
            $students[] = (new Students())
                ->setStudentFname($this->nameService->getFirstName())
                ->setStudentLname($this->nameService->getLastName())
                ->setStudentPhone($this->phoneService->getPhone())
                ->setStudentBirth($this->birthService->getBirthDate(1990, 2010))
                ->setHouse($this->houseService->getHouse());
        }
        $this->persist($manager, ...$students);
    }
    
    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}
