<?php

namespace App\DataFixtures;

use App\Entity\House;
use App\Entity\Teacher;
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
        $nbTeacher = 50; 
        $Teacher = [];
        
        for ($i = 0; $i < $nbTeacher; $i++) {
            $Teacher[] = (new Teacher())
                ->setTeacherFname($this->nameService->getFirstName())
                ->setTeacherLname($this->nameService->getLastName())
                ->setTeacherPhone($this->phoneService->getPhone())
                ->setTeacherBirth($this->birthService->getBirthDate(1920, 1950));
        }

        $houses = [];
        $houses[] = (new House())->setName('Gryffindor')->setHouseMaster($Teacher[0]);
        $houses[] = (new House())->setName('Ravenclaw')->setHouseMaster($Teacher[1]);
        $houses[] = (new House())->setName('Slytherin')->setHouseMaster($Teacher[2]);
        $houses[] = (new House())->setName('Hufflepuff')->setHouseMaster($Teacher[3]);


        $this->persist($manager, ...$Teacher, ...$houses);
    }
    
    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}