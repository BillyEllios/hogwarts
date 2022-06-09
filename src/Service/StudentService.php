<?php

namespace App\Service;

use App\Entity\Student;
use App\Repository\StudentRepository;

class StudentService {
    public function __construct(private StudentRepository $studentRepository) {}

    public function getStudent(): ?Student {
        $students = $this->studentRepository->findAll();
        return $students[array_rand($students)];
    }

}