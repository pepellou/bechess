<?php

namespace App\DataFixtures;


use App\Entity\User;
use App\Entity\Student;
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
        $pepe->setPassword('b68fe43f0d1a0d7aef123722670be50268e15365401c442f8806ef83b612976b');  // 'password'
        $pepe->setFideRating(2065);
        $pepe->setLichessHandle('pepellou');
        $pepe->setLichessAccessKey('RwTXx8ko3ex9r9vU');
        $pepe->setType('teacher');

        $alumno = new User();
        $alumno->setNickname('JackyShowss');
        $alumno->setEmail('pepellou+jacky@gmail.com');
        $alumno->setFirstName('Jacopo');
        $alumno->setLastName('Zimmari');
        $alumno->setPassword('b68fe43f0d1a0d7aef123722670be50268e15365401c442f8806ef83b612976b');  // 'password'
        $alumno->setFideRating(null);
        $alumno->setLichessHandle('JackyShowss');
        $alumno->setLichessAccessKey(null);
        $alumno->setType('student');

        $estudiante = new Student();
        $estudiante->setDni("12345678X");
        $estudiante->setBirthDate(new \DateTime('1983-07-21'));
        $estudiante->setNotes("This is a fake student");
        $estudiante->setFatherFullName("Pepe Doval");
        $estudiante->setMotherFullName("-");
        $estudiante->setFatherPhone("650795886");
        $estudiante->setMotherPhone("-");
        $estudiante->setFatherFixedPhone("881817077");
        $estudiante->setMotherFixedPhone("-");
        $estudiante->setFamilyAddress("c/ Hedras, 7, 4C");
        $estudiante->setPostalCode("15895");
        $estudiante->setDniSigningAuthority("44474770-S");
        $estudiante->setAuthorityEmail("pepellou@gmail.com");
        $estudiante->setUser($alumno);

        $manager->persist($pepe);
        $manager->persist($alumno);
        $manager->persist($estudiante);
        $manager->flush();
    }

}
