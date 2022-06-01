<?php

namespace App\Service;

use DateTime;

class BirthService {
    public function getBirthDate(int $minYear, int $maxYear) : DateTime {
        return new DateTime(rand($minYear, $maxYear) . '-' . rand(1, 12). '-' . rand(1, 29));
    }
}
