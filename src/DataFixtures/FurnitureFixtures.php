<?php

namespace App\DataFixtures;

use App\Entity\Furniture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FurnitureFixtures extends Fixture
{
    public function __construct()
    {

    }    

    public function load(ObjectManager $manager)
    {
        $furniture = [];
        $furniture[] = (new Furniture())->setName('Wand');
        $furniture[] = (new Furniture())->setName('Robe');
        $furniture[] = (new Furniture())->setName('Broomstick');
        $furniture[] = (new Furniture())->setName('Crucible');

        $this->persist($manager, ...$furniture);
    }

    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}