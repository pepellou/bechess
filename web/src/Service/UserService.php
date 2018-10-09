<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class UserService {

    private $em;
    private $session;

    private $userRepository;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $em, SessionInterface $session)
    {
        $this->em = $em;
        $this->session = $session;

        $this->userRepository = $userRepository;
    }


    public function login(User $credentials)
    {
        $found = $this->userRepository
            ->findOneBy([
                'email' => $credentials->getEmail(),
                'password' => $credentials->getPassword()
            ]);


        if (is_null($found)) {
            return false;
        }

        $this->session->set('user', $found);

        return true;
    }

    public function getStudents()
    {
        return $this->userRepository
            ->findBy([
                'type' => 'student'
            ]);
    }

    public function getStudent($nickname)
    {
        return $this->userRepository
            ->findOneBy([
                'type' => 'student',
                'nickname' => $nickname
            ]);
    }

}
