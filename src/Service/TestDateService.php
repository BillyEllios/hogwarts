<?php

namespace App\Service;

use DateTime;

class TestDateService {
    public function getTestDate(int $minYear, int $maxYear) : DateTime {
        return new DateTime(rand($minYear, $maxYear) . '-' . rand(1, 12). '-' . rand(1, 29));
    }
}