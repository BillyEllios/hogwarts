<?php

namespace App\Service;

class PhoneService {
    private const PHONES = ['Wingardium:01', 'Wingardium:02', 'Wingardium:03','Wingardium:04','Wingardium:05','Wingardium:06','Wingardium:07','Wingardium:08','Wingardium:09','Wingardium:10'];
    
    public function getPhone(): string {
        return PhoneService::PHONES[array_rand(PhoneService::PHONES)];
    }
}