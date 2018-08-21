<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $pepe = new User();
        $pepe->setNickname('pepellou');
        $pepe->setEmail('pepellou@gmail.com');
        $pepe->setFirstName('Pepe');
        $pepe->setLastName('Doval');
        $pepe->setPassword('password');
        $pepe->setFideRating(2065);
        $pepe->setLichessHandle('pepellou');
        $pepe->setLichessAccessKey('RwTXx8ko3ex9r9vU');

        $manager->persist($pepe);
        $manager->flush();
    }

}
