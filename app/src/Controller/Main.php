<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Main
{
    /**
    * @Route("/", name="home")
    */
    public function home()
    {

        return new Response(
            '<html><body>hello</body></html>'
        );
    }
}