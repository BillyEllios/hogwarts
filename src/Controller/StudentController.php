<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/Student')]
class StudentController extends AbstractController
{
    #[Route('/', name: 'app_Student_index', methods: ['GET'])]
    public function index(StudentRepository $StudentRepository): Response
    {
        return $this->render('Student/index.html.twig', [
            'Student' => $StudentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_Student_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StudentRepository $StudentRepository): Response
    {
        $student = new Student();
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $StudentRepository->add($student, true);

            return $this->redirectToRoute('app_Student_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Student/new.html.twig', [
            'student' => $student,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_Student_show', methods: ['GET'])]
    public function show(Student $student): Response
    {
        return $this->render('Student/show.html.twig', [
            'student' => $student,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_Student_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Student $student, StudentRepository $StudentRepository): Response
    {
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $StudentRepository->add($student, true);

            return $this->redirectToRoute('app_Student_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('Student/edit.html.twig', [
            'student' => $student,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_Student_delete', methods: ['POST'])]
    public function delete(Request $request, Student $student, StudentRepository $StudentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
            $StudentRepository->remove($student, true);
        }

        return $this->redirectToRoute('app_Student_index', [], Response::HTTP_SEE_OTHER);
    }
}
