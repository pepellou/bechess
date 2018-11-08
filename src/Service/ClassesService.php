<?php

namespace App\Service;

use App\Repository\GroupRepository;

class ClassesService {

    private $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }


    public function getClassesForWeek($week) {
        $classes = [];
        foreach ($week as $day) {
            $classes[]= [
                "day" => $day,
                "classes" => $this->groupRepository->findBy([ 'dayOfWeek' => date_format($day, 'N') ])
            ];
        }
        return $classes;
    }

}
