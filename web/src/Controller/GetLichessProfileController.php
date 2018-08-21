<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class GetLichessProfileController
{

    public function profile()
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

        $profile = json_decode(curl_exec($ch));

        return new Response(
            '<html><body>We got this: <pre>' . print_r($profile, true) . '</pre></body></html>'
        );
    }

}
