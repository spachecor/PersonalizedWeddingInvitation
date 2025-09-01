<?php
namespace model;
use util\Optional;
/***
 * Clase Entidad, que es la clase base de las entidades del modelo
 * @author Selene
 * @version 1.0
 */
class Entidad{
    private int $id;

    private function __construct(int $id){
        $this->id = $id;
    }

    /**
     * Crea una nueva entidad y asigna un id si es válido.
     * Devuelve un Optional, donde el valor será la entidad creada o null si el id es inválido.
     * @param $id El id de la Entidad
     */
    public function crearEntidad(int $id): Optional{
        if ($id <= 0) {
            return new Optional(null);
        }
        return new Optional(new Entidad($id));
    }

    public function getId(): int{
        return $this->id;
    }
}
?>