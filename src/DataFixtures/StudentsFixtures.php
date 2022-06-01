<?php

namespace App\DataFixtures;

use App\Entity\Students;
use App\Service\BirthService;
use App\Service\NameService;
use App\Service\PhoneService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StudentsFixtures extends Fixture
{
    public function __construct(private NameService $nameService, private BirthService $birthService, private PhoneService $phoneService)
    {
        
    }

    public function load(ObjectManager $manager): void
    {
        $nbStudents = 50;

        for ($i = 0; $i < $nbStudents; $i++) {
            $students[] = (new Students())
                ->setStudentFname($this->nameService->getLastName())
                ->setStudentLname($this->nameService->getLastName())
                ->setStudentPhone($this->phoneService->getPhone())
                ->setStudentBirth($this->birthService->getBirthDate(1990, 2010));
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
