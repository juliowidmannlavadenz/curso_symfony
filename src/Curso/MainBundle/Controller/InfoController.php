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

    public function pagina_estaticaAction($pagina)
    {
        /*$response = $this->forward("CursoMainBundle:Info:nosotros", array(
            "nombre"=>"Julio","apellidos"=>"widmann","nacimiento"=>"arequipa"
        ));
        return $response;*/

        //$mailer = $this->get("mailer");

        if ($pagina=="quienes_somos") {
            return $this->redirect($this->generateUrl("curso_main_info", array("slug" => "quien")));
            }if ($pagina=="quien" || $pagina=="donde" ) {
                return $this->render("CursoMainBundle:Default:" . $pagina . ".html.twig", array());
            }else{
                throw $this-> createNotFoundException("Pagina no encontrada");
    }
    }
}