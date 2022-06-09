<?php

namespace App\Service;

use App\Entity\Teacher;
use App\Repository\TeacherRepository;

class TeacherService {
    public function __construct(private TeacherRepository $teacherRepository) {}

    public function getTeacher(): Teacher {
        $teachers = $this->teacherRepository->findAll();
        return $teachers[array_rand($teachers)];
    }

}