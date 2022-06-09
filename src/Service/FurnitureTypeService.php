<?php

namespace App\Service;

use App\Entity\FurnitureType;
use App\Repository\FurnitureTypeRepository;

class FurnitureTypeService {
    public function __construct(private FurnitureTypeRepository $furnitureTypeRepository) {

    }

    public function getFurnituresTypes(): FurnitureType {
        $furnitures = $this->furnitureTypeRepository->findAll();
        return $furnitures[array_rand($furnitures)];
    }


    public function getFromName($name) {
        return $this->furnitureTypeRepository->findOneBy(['name' => $name]);
    }
}