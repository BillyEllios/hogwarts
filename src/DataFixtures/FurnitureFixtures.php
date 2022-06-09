<?php

namespace App\DataFixtures;

use App\Entity\Furniture;
use App\Service\StudentService;
use App\Service\FurnitureTypeService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FurnitureFixtures extends Fixture implements DependentFixtureInterface
{

    public function __construct(
        private FurnitureTypeService $furnitureTypeService,
        private StudentService $studentService)
    {
        
    }

    public function getDependencies() {
        return [
            FurnitureTypeFixtures::class,
            StudentFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        $furnitureEntities = [];
        $furnitures = ['Surreau Wand' => 'Wand','Basic Wand' => 'Wand',
        'Invisibility Cloak' => 'Clothes', 'Nimbus 2000' => 'Broomstick',
        'Nimbus 4000' => 'Broomstick','Robe of Gryffindor' => 'Clothes',
        'Robe of Ravenclaw' => 'Clothes','Robe of Slytherin' => 'Clothes',
        'Robe of Hufflepuff' => 'Clothes','Basic Crucible' => 'Crucible','Golden Crucible' => 'Crucible'];

        foreach ($furnitures as $furniture => $furnitureType){
            $furnitureEntities [] = (new Furniture())
                ->setName($furniture)
                ->setStudent($this->studentService->getStudent())
                ->setFurnituresTypes($this->furnitureTypeService->getFromName($furnitureType));
        }

        $this->persist($manager, ...$furnitureEntities);
    }

    private function persist(ObjectManager $manager, ...$objects)
    {
        foreach ($objects as $o) {
            $manager->persist($o);
        }

        $manager->flush();
    }
}