<?php
namespace model;
use conduct\Creable;
/**
 * Clase abstracta encargada de modelar el comportamiento de todas las entidades del programa
 * @author Selene
 * @version 1.0
 */
abstract class Entidad implements Creable{
    private int $id;

    protected function __construct(int $id){
        $this->id = $id;
    }

    public function getId(): int{
        return $this->id;
    }
}
?>