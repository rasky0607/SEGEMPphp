<?php
include_once "persona.php";
// para generar herencia  enste caso hereda de  la clase Persona
class Estudiante extends Persona{
    private $codigo;
    private $matricula;
    private static $nmodulos;
}

function __construct($nombre,$apellido,$edad,$codigo,$matricula)
{
    //Hacer referencia dentro de la propia clase al elemento padre o acceder al padre($nombre,$apellido,$edad)
    //Llamos al constructor de la clase 
    //parent:: __construct($nombre,$apellido,$edad);
    parent::__construct($nombre,$apellido,$edad);
    $this->$codigo = $codigo;
    $this->$matricula = $matricula;
}

function getCodigo(){
    return $this->codigo;
}

function getMatricula(){
    return $this->matricula;
}

/**
 * Se puede sobreescribir  un metodo siempre que se declare con el mismo nombre y como minimo el mismo numero de parametros
 * pero puede contener más
 */
function getSaludar(){
    return parent::getSalusar()."<p> Mi codigo es ".$this->codigo." y mi matricula es".$this->matricula."</p>";
}

/**
 * Al ser static se debe accder atraves del nombre de la clase seguido de dos puntos y la variable
 */
function getModulos(){
    return Estudiante::$nmodulos;
}

/**Este metodo es de obligada implementacion ya que es un metodo abstracto que tiene la clase persona y la clase Estudiante incluye a persona
 */
/**function getDespedir(){
    return "<p> Adios </p>";
}*/

function getDespedir(){
    return "Adios, soy un estudiante";
}

?>