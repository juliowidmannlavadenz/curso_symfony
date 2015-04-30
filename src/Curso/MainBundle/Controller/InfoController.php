<?php

namespace Curso\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class InfoController extends Controller
{
    public function nosotrosAction($nombre,$apellidos,$nacimiento)
    {
        return new Response("<html><body>Mi página de información propia: ".$nombre.' '."".$apellidos." </body></html>");
    }
}