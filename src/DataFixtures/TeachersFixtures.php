<?php

namespace App\DataFixtures;

use App\Entity\Teachers;
use App\Service\NameService;
use App\Service\BirthService;
use App\Service\PhoneService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeachersFixtures extends Fixture
{
    public function __construct(private NameService $nameService, private BirthService $birthService, private PhoneService $phoneService)
    {
        
    }

    public function load(ObjectManager $manager): void
    {
        $nbTeachers = 50;
        
        for ($i = 0; $i < $nbTeachers; $i++) {
            $teachers[] = (new Teachers())
                ->setTeacherFname($this->nameService->getFirstName())
                ->setTeacherLname($this->nameService->getLastName())
                ->setTeacherPhone($this->phoneService->getPhone())
                ->setTeacherBirth($this->birthService->getBirthDate(1920, 1950));
        }
        $this->persist($manager, ...$teachers);
    }
    
    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}