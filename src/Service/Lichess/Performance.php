<?php

namespace App\Service\Lichess;


class Performance
{

    public function __construct($data)
    {
        $this->games = $data->games;
        $this->rating = $data->rating;
        $this->rd = $data->rd;
        $this->prog = $data->prog;
    }

}
