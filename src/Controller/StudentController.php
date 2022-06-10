<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\HouseRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    public function __construct(
        private HouseRepository $houseRepository,
        private StudentRepository $studentRepository,
    )
    {

    }

    #[Route('/countHouse/{house_id}', name: 'app_student_house', methods: ['GET'])]
    public function countHouse($house_id): Response
    {
        $house = $this->houseRepository->findOneBy(['id' => $house_id]);
        $students = $this->studentRepository->findBy(['house' => $house]);

        return $this->json(['count' => count($students)]);
    }
};