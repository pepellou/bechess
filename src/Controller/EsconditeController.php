<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class EsconditeController extends AbstractController
{

    /**
     * @Route("/escondite")
     */
    public function home(Request $request)
    {
        return $this->render('escondite/home.html.twig');
    }

}
