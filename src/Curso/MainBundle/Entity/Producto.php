<?php
namespace Curso\MainBundle\Entiy;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 *
 */

class Producto {
    /**
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Id
     * @ORM\Column(type="string",lenght=100)
     * @ORM\GeneratedValue
     */
    protected $nombre;
    /**
     * @ORM\Column(type="integer")
     */
    protected $precio;

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }
}










