<?php

namespace Curso\MainBundle\Controller;

use Curso\MainBundle\Entity\Producto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function  addOneAction($nombre,$precio)
    {
        $producto = new Producto();
        $producto->setNombre($nombre);
        $producto->setPrecio($precio);

        $em = $this->getDoctrine()->getManager();
        $em->persist($producto);
        $em->flush();

        return new Response("<html><body>
                Id del nuevo producto:".$producto->getId()."<br/>
                Nombre del producto:".$nombre."<br/>
                Precio del Producto:".$precio."<br/>
               </body>
               </html>"
                //'Id del nuevo producto: '.$producto->getId().'; el producto se ha creado OK'
        );
    }


}