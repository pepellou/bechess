<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class SessionController extends AbstractController
{

    /**
     * @Route("/login")
     */
    public function login(Request $request)
    {
        $loginData = new User();

        $loginForm = $this->createFormBuilder($loginData)
            ->add(
                'nickname',
                TextType::class,
                array(
                    'label' => 'Nick'
                )
            )
            ->add(
                'password',
                PasswordType::class,
                array(
                    'label' => 'Password'
                )
            )
            ->add(
                'login',
                SubmitType::class,
                array(
                    'label' => 'Login'
                )
            )
            ->getForm();

        $loginForm->handleRequest($request);

        if ($loginForm->isSubmitted() && $loginForm->isValid()) {
            $userCredentials = $loginForm->getData();

            // do login

            return $this->redirectToRoute('app_getlichessprofile_profile');
        }

        return $this->render(
            'session/login.html.twig',
            array(
                'form' => $loginForm->createView()
            )
        );
    }

}
