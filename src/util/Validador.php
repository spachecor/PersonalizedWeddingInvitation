<?php
namespace util;
/**
 * Clase que se encarga de reunir las validaciones necesarias
 * @author Selene
 * @version 1.0
 */
class Validador{
    /**
     * Valida una cadena para que no sea null, sea un string y tenga longitud mayor que cero
     * @param $cadena La cadena a comprobar
     * @return bool Devuelve true si la cadena es válida y false si no cumple
     */
    public static function validarCadena(string $cadena):bool {
        if($cadena==null || !is_string($cadena) || strlen($cadena)<=0){
            return false;
        }
        return true;
    }
    /**
     * Valida un número para que no sea null, sea un int y tenga valor positivo(mayor o igual a 0)
     * @param $numero El numero a comprobar
     * @return bool Devuelve true si el número es válido y false si no cumple
     */
    public static function validarNumeroPositivo(int $numero):bool {
        if($numero==null || !is_int($numero) || $numero<0){
            return false;
        }
        return true;
    }
    /**
     * Valida un número para que no sea null, sea un int y tenga valor mayor que cero
     * @param $numero El numero a comprobar
     * @return bool Devuelve true si el número es válido y false si no cumple
     */
    public static function validarNumeroMayorQueCero(int $numero):bool {
        if($numero==null || !is_int($numero) || $numero<=0){
            return false;
        }
        return true;
    }
}
?>