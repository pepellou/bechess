<?php

namespace App\Controller;

use App\Service\UserService;
use App\Service\ClassesService;
use App\Service\UtilsService;

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
    public function students(Request $request, UserService $users)
    {
        return $this->render(
            'teacher/students.html.twig',
            array(
                'students' => $users->getStudents()
            )
        );
    }

    /**
     * @Route("/{_locale}/student/{nickname}")
     */
    public function student($nickname, Request $request, UserService $users)
    {
        return $this->render(
            'teacher/student.html.twig',
            array(
                'student' => $users->getStudent($nickname)
            )
        );
    }

    /**
     * @Route("/{_locale}/schedule")
     */
    public function schedule(Request $request, ClassesService $classes, UtilsService $utils)
    {
        return $this->render(
            'teacher/schedule.html.twig',
            array(
                'classes' => $classes->getClassesForWeek($utils->getCurrentWeek())
            )
        );
    }

}
