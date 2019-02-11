<?php
/**Creamos la interfaz Despedida que obliga a implementar el metodo
 * getDespedida
 */

 interface Despdida{
    function getDespedir();
 }
 class Persona implements Despedida{
    private $nombre;
    private $apellido;
    private $edad;

    function __construct($nombre,$apellido,$edad)
    {
        $this->$nombre=$nombre;
        $this->$apellido=$apellido;
        $this->$edad=$edad;
    }

    //Gets

    function getNombre(){
        return $this->nombre;
    }

    function getApellido(){
        return $this->apellido;
    }

    function getEdad(){
        return $this->edad;
    }

    function getSaludar(){
        return "Hola soy ".$this->nombre." ".$this->apellido." y tengo ".$this->edad." años.";
    }

    /**Cuando una clase contine al menos un metodo abstracto
     * se debe definir como abstract class
     * Cuando una clase abstracta es usada en otra o implementada con include
     * esta debera implementar el metodo abstracto.
     */

     //abstract function getDespedir();

     //Implementacion del interfaz
     function getDespedir(){
         return "Adios,soy una persona.";
     }

     //Declaracion de funcion estatica
     /**static function funcionStatic(){

     }*/
}
?>