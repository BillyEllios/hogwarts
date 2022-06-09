<?php

namespace App\DataFixtures;

use App\Entity\Test;
use App\Service\StudentService;
use App\Service\CourseService;
use App\Service\MarkService;
use App\Service\TestDateService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TestFixtures extends Fixture implements DependentFixtureInterface {
    
    public function __construct(
        private CourseService $courseService, 
        private StudentService $studentService,
        private MarkService $markService,
        private TestDateService $testDateService,)
    {
        
    }

    public function getDependencies() {
        return [
            StudentFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $test = [];
        $tests = ['Test of Astronomy','Test of Charms','Test of Dark Arts','Test of Defence Against the Dark Arts','Test of Herbology','Test of History of Magic','Test of Potions','Test of Transfiguration'];

        for ($i=0; $i<7; $i++) {
            $test[] = (new Test())
            ->setName($tests[$i])
            ->setCourses($this->courseService->getCourses())
            ->setStudent($this->studentService->getStudent())
            ->setDate($this->testDateService->getTestDate(2022, 2023))
            ->setMark($this->markService->getMark());
        }

        $this->persist($manager, ...$test);
    }

    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}