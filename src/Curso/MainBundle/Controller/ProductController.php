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
                Id del nuevo producto:" . $producto->getId() . "<br/>
                Nombre del producto:" . $nombre . "<br/>
                Precio del Producto:" . $precio . "<br/>
               </body>
               </html>"
        //'Id del nuevo producto: '.$producto->getId().'; el producto se ha creado OK'
        );
    }
    public function getAllAction()
    {
        $em = $this->getDoctrine()->getManager();
        $productos = $em-> getRepository('CursoMainBundle:Producto')->findAll();
        $res = "P R O D U C T O S:<br>";
        foreach ($productos as $producto)
        {
            $res .=$producto->getNombre().'  Precio: '.$producto->getPrecio().'<br/>';
        }
        return new Response($res);
    }

    public function getByIdAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$producto = $em->find('CursoMainBundle:Producto',$id);
        //$producto = $em->getRepository('CursoMainBundle:Producto')->find(id);
        $producto = $em->getRepository('CursoMainBundle:Producto')->findOneById($id);
        return new Response(
            'Producto :'.$producto->getNombre().' con precio '.$producto->getPrecio().' ordenado por id'
        );
    }

    public function getByNombreAction($nombre)
    {
        $repository = $this->getDoctrine()->getRepository('CursoMainBundle:Producto');
        $producto = $repository->findOneByNombre($nombre);
        //$producto = $repository->findBy(array("nombre"=>$nombre),20,0);
        return new Response(
                'Producto: '.$producto->getNombre().' con precio '.$producto->getPrecio().' ordenado por nombre'
        );
    }

    public function updateAction($id,$nombre,$precio)
    {
        $em = $this->getDoctrine()->getManager();
        $producto = $em->getRepository('CursoMainBundle:Producto')->find($id);
        if (!$producto)
        {
            throw $this->createNotFoundException(
                'No se ha encontrado el producto para la id '.$id
            );
        }
        $producto->setNombre($nombre);
        $producto->setPrecio($precio);
        $em->flush();
        return new Response(
            'Producto: '.$producto->getNombre().' con precio '.$producto->getPrecio()
        );
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $producto = $em->getRepository('CursoMainBundle:Producto')->find($id);
        if (!$producto)
        {
            throw $this->createNotFoundException(
                    'No se encontro el producto para la id '.$id
            );
        }

        $producto_borrado=$producto->getNombre();
        $em->remove($producto);
            $em->flush();
            return new Response(
                    'Producto eliminado: '.'<strong>'.$producto_borrado.'</strong>'
            );

    }


}