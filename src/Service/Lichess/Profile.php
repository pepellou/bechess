<?php

namespace App\Service\Lichess;


class Profile
{

    public function __construct($data)
    {
        $this->country = $data->country;
        $this->location = $data->location;
        $this->bio = $data->bio;
        $this->firstName = $data->firstName;
        $this->lastName = $data->lastName;
        $this->fideRating = $data->fideRating;
        $this->links = $data->links;
    }

}
