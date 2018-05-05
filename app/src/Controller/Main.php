<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Main extends Controller
{
    /**
    * @Route("/", name="home")
    */
    public function home()
    {

        return $this->render(
            'main/home.html.twig',
            array()
        );
    }
}