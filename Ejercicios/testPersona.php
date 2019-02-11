<?php
include_once "biblioteca.php";
//include "persona.php";
include_once "estudiante.php"; //estudiante ya incluye persona, si incluimos de nuevo persona , nos dara error.
include_once "persona.php";

print_head("Segunda clase PHP.");

$persona = new Persona("Paco","Cano",23);
echo"<p>".$persona->getSaludar()."</p>";
$estudiante = new Estudiante("Carlos","Barrales",18,4,"segundo",4);
echo"<p>".$estudiante->getSaludar()."</p>";

/**
 * Array de objetos
 */

 $array_personas = array();
 $array_personas[0]=$persona;
 $array_personas[1]=$estudiante;

 for ($i=0;$i<count($array_personas);$i++){

     //Si es un Estudiante
     if($array_personas[$i] instanceof Estudiante){
         echo"<h2>ESTUDIANTE</h2>";
         echo"<p>Nombre: ".$array_personas[$i]->getNombre()."</p>";
         echo"<p>Apellido: ".$array_personas[$i]->getApellido()."</p>";
         echo"<p>Edad: ".$array_personas[$i]->getEdad()."</p>";
         echo"<p>Codigo: ".$array_personas[$i]->getCodigo()."</p>";
         echo"<p>Matricula: ".$array_personas[$i]->getMatricula()."</p>";
         echo"<p>nModulos: ".$array_personas[$i]->getModulos()."</p>";
     }
     else{
        echo"<h2>PERSONA</h2>";
        echo"<p>Nombre: ".$array_personas[$i]->getNombre()."</p>";
        echo"<p>Apellido: ".$array_personas[$i]->getApellido()."</p>";
        echo"<p>Edad: ".$array_personas[$i]->getEdad()."</p>";
     }
 }

 echo "<p>".$array_personas[0]->getDespedir()."</p>";
 echo "<p>".$array_personas[1]->getDespedir()."</p>";

 //Eliminamos el array
 unset($array_personas);

print_footer();
?>