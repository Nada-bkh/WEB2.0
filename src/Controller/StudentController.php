<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/students', name: 'student_index')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    #[Route('/show', name: 'show')]
    public function show(): Response
    {
        return new Response('<h1>Bonjour Abdennour </h1>');
    }

    #[Route ('/fetch', name: 'fetch')]
    public function fetch(StudentRepository $studentRepository): Response
    {
        $result = $studentRepository->findAll();

        return $this->render('student/test.html.twig',[
            'response' => $result
        ]);
    }
    #[Route ('/add', name: 'add')]
    public function add (ManagerRegistry $managerRegistry):Response {

        $student = new Student();
        $student -> setName('ala');
        $student -> setEmail('ala@gmail.com');
        $student -> setAge(30);

        $entityManager = $managerRegistry->getManager();
        $entityManager -> persist($student);
        $entityManager -> flush();

        return $this->redirectToRoute('fetch');

    }
}
