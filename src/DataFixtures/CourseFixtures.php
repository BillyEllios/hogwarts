<?php

namespace App\DataFixtures;

use App\Entity\Course;
Use App\Service\TeacherService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private TeacherService $teacherService)
    {

    }  

    public function getDependencies() {
        return [
            HousesFixtures::class,
        ];
    }  

    public function load(ObjectManager $manager)
    {
        $course = [];
        $course[] = (new Course())->setName('Astronomy')->setTeacher($this->teacherService->getTeacher());
        $course[] = (new Course())->setName('Charms')->setTeacher($this->teacherService->getTeacher());
        $course[] = (new Course())->setName('Dark Arts')->setTeacher($this->teacherService->getTeacher());
        $course[] = (new Course())->setName('Defence Against the Dark Arts')->setTeacher($this->teacherService->getTeacher());
        $course[] = (new Course())->setName('Herbology')->setTeacher($this->teacherService->getTeacher());
        $course[] = (new Course())->setName('History of Magic')->setTeacher($this->teacherService->getTeacher());
        $course[] = (new Course())->setName('Potions')->setTeacher($this->teacherService->getTeacher());
        $course[] = (new Course())->setName('Transfiguration')->setTeacher($this->teacherService->getTeacher());

        $this->persist($manager, ...$course);
    }

    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}