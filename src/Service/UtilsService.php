<?php

namespace App\Service;

class UtilsService {

    public function getCurrentWeek() {
        $day = new \DateTime("last sunday");
        $day->modify('+1 day');

        $days = [ $day ];

        for ($i = 0; $i < 6; $i++) {
            $day = clone($day);
            $day->modify('+1 days');
            $days []= $day;
        }

        return $days;
    }

}
