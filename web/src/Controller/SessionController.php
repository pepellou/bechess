<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginType;
use App\Service\UserService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class SessionController extends AbstractController
{

    /**
     * @Route("/login")
     */
    public function login(Request $request, UserService $users, SessionInterface $session)
    {
        $loginData = new User();

        $loginForm = $this->createForm(LoginType::class, $loginData);

        $loginForm->handleRequest($request);

        if ($loginForm->isSubmitted() && $loginForm->isValid()) {
            $userCredentials = $loginForm->getData();

            if (!$users->login($userCredentials)) {
                return $this->redirectToRoute('app_session_access_error');
            }

            $userType = $session->get('user')->getType();

            return $this->redirectToRoute("app_${userType}_home");
        }

        return $this->render(
            'session/login.html.twig',
            array(
                'form' => $loginForm->createView()
            )
        );
    }

    /**
     * @Route("/logout")
     */
    public function logout(SessionInterface $session)
    {
        $session->clear();
        $session->invalidate();
        return $this->redirectToRoute('app_default_home');
    }

    /**
     * @Route("/access-error")
     */
    public function access_error()
    {
        return $this->render('session/access_error.html.twig');
    }

}
