<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function home(Request $request)
    {
        $locale = $request->attributes->get('_locale');

        return $this->redirectToRoute(
            'app_default_home_i18n',
            array(
                '_locale' => $locale
            )
        );
    }

    /**
     * @Route("/{_locale}/")
     */
    public function home_i18n($_locale)
    {
        return $this->render('default/home.html.twig');
    }

}
