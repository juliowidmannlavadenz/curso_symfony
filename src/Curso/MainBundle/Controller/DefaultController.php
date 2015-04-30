<?php

namespace Curso\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name,$edad)
    {
        return $this->render('CursoMainBundle:Default:index.html.twig', array('name' => $name,'edad' => $edad));
    }

    public function ayudaAction($tema)
    {
        //return new Response("<html><body>Esta es la ayuda sobre el tema: ".$tema."</body></html>");
        return $this->render("CursoMainBundle:Default:ayuda.html.twig", array("tema" => $tema));
    }
}
