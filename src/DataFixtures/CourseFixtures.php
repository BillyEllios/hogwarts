<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture
{
    public function __construct()
    {

    }    

  

    public function load(ObjectManager $manager)
    {
        $course = [];
        $course[] = (new Course())->setName('Astronomy');
        $course[] = (new Course())->setName('Charms');
        $course[] = (new Course())->setName('Dark Arts');
        $course[] = (new Course())->setName('Defence Against the Dark Arts');
        $course[] = (new Course())->setName('Herbology');
        $course[] = (new Course())->setName('History of Magic');
        $course[] = (new Course())->setName('Potions');
        $course[] = (new Course())->setName('Transfiguration');

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