<?php

namespace App\DataFixtures;

use App\Entity\House;
use App\Entity\Teachers;
use App\Service\NameService;
use App\Service\BirthService;
use App\Service\PhoneService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HousesFixtures extends Fixture
{
    public function __construct(private NameService $nameService, private BirthService $birthService, private PhoneService $phoneService)
    {
        
    }

    public function load(ObjectManager $manager): void
    {
        $nbTeachers = 50; 
        $teachers = [];
        
        for ($i = 0; $i < $nbTeachers; $i++) {
            $teachers[] = (new Teachers())
                ->setTeacherFname($this->nameService->getFirstName())
                ->setTeacherLname($this->nameService->getLastName())
                ->setTeacherPhone($this->phoneService->getPhone())
                ->setTeacherBirth($this->birthService->getBirthDate(1920, 1950));
        }

        $houses = [];
        $houses[] = (new House())->setName('Gryffindor')->setHouseMaster($teachers[0]);
        $houses[] = (new House())->setName('Ravenclaw')->setHouseMaster($teachers[1]);
        $houses[] = (new House())->setName('Slytherin')->setHouseMaster($teachers[2]);
        $houses[] = (new House())->setName('Hufflepuff')->setHouseMaster($teachers[3]);


        $this->persist($manager, ...$teachers, ...$houses);
    }
    
    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}