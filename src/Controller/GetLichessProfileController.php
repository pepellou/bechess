<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\LichessService;

class GetLichessProfileController
{

    /**
     * @Route("/lichess")
     */
    public function profile(LichessService $lichess)
    {
        return new Response(
            '<html><body>We got this: <pre>' . print_r($lichess->getProfile(), true) . '</pre></body></html>'
        );
    }

}
