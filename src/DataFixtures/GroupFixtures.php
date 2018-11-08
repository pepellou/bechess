<?php

namespace App\DataFixtures;


use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GroupFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $grupoDani = new Group();
        $grupoDani->setName('Grupo de Dani y Óscar');
        $grupoDani->setLevel('Intermedio');
        $grupoDani->setDayOfWeek(3);
        $grupoDani->setStartHour('19:30');
        $grupoDani->setEndHour('20:30');

        $grupoCali = new Group();
        $grupoCali->setName('Grupo de Calíope');
        $grupoCali->setLevel('Iniciación niños');
        $grupoCali->setDayOfWeek(3);
        $grupoCali->setStartHour('19:30');
        $grupoCali->setEndHour('20:30');

        $grupoFieras = new Group();
        $grupoFieras->setName('Grupo de fieras');
        $grupoFieras->setLevel('Iniciación niños');
        $grupoFieras->setDayOfWeek(3);
        $grupoFieras->setStartHour('18:30');
        $grupoFieras->setEndHour('19:30');

        $manager->persist($grupoDani);
        $manager->persist($grupoCali);
        $manager->persist($grupoFieras);
        $manager->flush();
    }

}
