<?php

namespace App\Service;


use App\Service\Lichess\User;

class LichessService
{

    public function getProfile()
    {
        $ch = curl_init();
        $headers = array(
            /*
            'Accept: application/json',
            'Content-Type: application/json',
             */
            'Authorization: Bearer RwTXx8ko3ex9r9vU'
        );
        curl_setopt($ch, CURLOPT_URL, 'https://lichess.org/api/account');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        return new User(json_decode(curl_exec($ch)));
    }

    public function getUser($user)
    {
        $ch = curl_init();
        $headers = array(
            /*
            'Accept: application/json',
            'Content-Type: application/json',
             */
            'Authorization: Bearer RwTXx8ko3ex9r9vU'
        );
        curl_setopt($ch, CURLOPT_URL, 'https://lichess.org/api/user/' . $user);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        return new User(json_decode(curl_exec($ch)));
    }

}
