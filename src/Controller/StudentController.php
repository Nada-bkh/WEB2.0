<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/students', name: 'student_index')]

    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'message' => 'Bonjour mes étudiants',
        ]);
    }
}
