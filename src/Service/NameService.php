<?php

namespace App\Service;

class NameService {
    private const F_NAME = ['Albus','Severus','Minerva','Filius', 'Reubus', 'Pomara', 'Sybille', 'Quirinus', 'Remus', 'Gilderoy'];
    private const L_NAME = ['Dumbledore','Rogue','Mcgonagall','Hagrid', 'Chourave', 'Trelawney', 'Quirrel', 'Lupin', 'Lockhart', 'Flitwik'];

    public function getFirstName(): string {
        return NameService::F_NAME[array_rand(NameService::F_NAME)];
    } 

    public function getLastName(): string {
        return NameService::L_NAME[array_rand(NameService::L_NAME)];
    } 
}