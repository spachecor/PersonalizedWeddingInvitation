<?php
namespace util;
/**
 * Clase Optional, que replica la clase Optional de Java
 * @author Selene
 * @version 1.0
 */
class Optional{
    private mixed $value;

    /**
     * Constructor del Optional. Tiene argumento opcional
     * @param $value Es el valor que contendrá el Optional. Si no hay, será null
     */
    public function __construct($value = null){
        $this->value = $value;
    }

    /**
     * Devuelve el valor si está presente, o un valor predeterminado
     * @param $default El valor que devolverá si no contiene valor
     */
    public function orElse($default):mixed {
        return $this->value !== null ? $this->value : $default;
    }

    /**
     * Devuelve si el valor está presente
     */
    public function isPresent():bool {
        return $this->value !== null;
    }

    /**
     * Ejecuta una función si el valor está presente
     * @param $action La función que ejecutará en caso de que el valor esté presente
     */
    public function ifPresent(callable $action):void {
        if ($this->isPresent()) {
            $action($this->value);
        }
    }

    /**
     * Devuelve el valor si está presente, o lanza una excepción si no lo está
     */
    public function get():mixed {
        if ($this->isPresent()) {
            return $this->value;
        }
        throw new \Exception("Value is not present.");
    }

    /**
     * Función que devuelve un optional vacío
     */
    public static function empty():Optional{
        return new Optional();
    }

    /**
     * Función que crea un optional del valor que ingresa por argumento
     * @param $value El valor que rellenará el Optional
     */
    public static function of(mixed $value): Optional {
        return new Optional($value);
    }
}
?>