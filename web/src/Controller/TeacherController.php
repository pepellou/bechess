<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class TeacherController extends AbstractController
{

    /**
     * @Route("/{_locale}/dashboard")
     */
    public function home(Request $request)
    {
        return $this->render('teacher/dashboard.html.twig');
    }

    /**
     * @Route("/{_locale}/students")
     */
    public function students(Request $request)
    {
        return $this->render(
            'teacher/students.html.twig',
            array(
                'students' => $students
            )
        );
    }

}
