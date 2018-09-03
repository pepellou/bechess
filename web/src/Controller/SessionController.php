<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class SessionController extends AbstractController
{

    /**
     * @Route("/login")
     */
    public function login(Request $request, UserRepository $users, SessionInterface $session)
    {
        $loginData = new User();

        $loginForm = $this->createFormBuilder($loginData)
            ->add(
                'email',
                TextType::class,
                array(
                    'label' => 'Email'
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

            $registeredUser = $users->findOneByEmail($userCredentials->getEmail());
            if (is_null($registeredUser) || $registeredUser->getPassword() != $userCredentials->getPassword()) {
                return $this->redirectToRoute('app_session_access_error');
            }

            $session->set('user', $registeredUser);

            return $this->redirectToRoute('app_default_home');
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
