<?php

namespace App\Service;

use App\Entity\Course;
use App\Repository\CourseRepository;

class CourseService {
    public function __construct(private CourseRepository $courseRepository) {}

    public function getCourses(): ?Course {
        $courses = $this->courseRepository->findAll();
        return $courses[array_rand($courses)];
    }

}