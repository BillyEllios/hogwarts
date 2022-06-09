<?php

namespace App\DataFixtures;

use App\Entity\FurnitureType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FurnitureTypeFixtures extends Fixture
{
    public function __construct()
    {

    }    

    public function load(ObjectManager $manager)
    {
        $furnitureType = [];
        $furnitureType[] = (new FurnitureType())->setName('Wand');
        $furnitureType[] = (new FurnitureType())->setName('Clothes');
        $furnitureType[] = (new FurnitureType())->setName('Broomstick');
        $furnitureType[] = (new FurnitureType())->setName('Crucible');

        $this->persist($manager, ...$furnitureType);
    }

    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}