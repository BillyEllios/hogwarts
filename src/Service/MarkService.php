<?php

namespace App\Service;

class MarkService {

    
    public function getMark(): int {
        return random_int(0,20);
    }
}
