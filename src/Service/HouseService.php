<?php

namespace App\Service;

use App\Entity\House;
use App\Repository\HouseRepository;

class HouseService {
    public function __construct(private HouseRepository $houseRepository) {}

    public function getHouse(): House {
        $houses = $this->houseRepository->findAll();
        return $houses[array_rand($houses)];
    }
}