<?php
namespace conduct;
use util\Optional;
/**
 * Interfaz creable, que define el método de creación
 * @author Selene
 * @version 1.0
 */
interface Creable{
    /**
     * Función crear, que crea un optional relleno del objeto en cuestión a crear
     * @param $args Los argumentos para crear un objeto tipo creable
     * @return Optional El objeto Optional envolviendo el objeto o vacío si algo ha fallado
     */
    public static function crear(...$args):Optional;
}

?>