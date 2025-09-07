<?php
namespace model;
use model\Entidad;
use util\Optional;
use util\Validador;
/**
 * Clase Mesa, que define como debe ser el objeto Mesa
 * @author Selene
 * @version 1.0
 */
class Mesa extends Entidad{
    private string $nombre;
    private int $capacidad;

    private function __construct(int $id, string $nombre, int $capacidad){
        parent::__construct($id);
        $this->nombre = $nombre;
        $this->capacidad = $capacidad;
    }

    public static function crear(...$args):Optional {
        if(count($args)!=3){
            return Optional::empty();
        }
        [$id, $nombre, $capacidad] = $args;
        if(!Validador::validarNumeroMayorQueCero($id)){
            return Optional::empty();
        }
        if(!Validador::validarCadena($nombre)){
            return Optional::empty();
        }
        if(!Validador::validarNumeroMayorQueCero($capacidad)){
            return Optional::empty();
        }
        return Optional::of(new Mesa($id, $nombre, $capacidad));
    }

    public function getNombre():string {
        return $this->nombre;
    }

    public function getCapacidad():int {
        return $this->capacidad;
    }
    public function __toString():string {
        return "Mesa: ".parent::getId()." - ".$this->nombre.", capacidad: ".$this->capacidad;
    }
}

?>