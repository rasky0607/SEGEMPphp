<?php
include "biblioteca.php";
include "triangulo.php";
print_head("Primera clase en PHP");
//para crear un objeto en PHP utilizamos $nombrevariable = new nombre de clase con sus parametros del cosntructor.
$triangulo = new Triangulo(3,5);
echo "<h1>datos de triangulo</h1>";
//En lugar de $triangulo = triangulo.getCateto1() como seria en otro lenguale
// Aqui es .$triangulo->getCateto1(). donde la -> es como el . para llamar  a una funcion de otra clase
echo "<p>".$triangulo->getCateto1()."</p>";
echo "<p>".$triangulo->getCateto2()."</p>";
echo "<p>".$triangulo->getHipotenusa()."</p>";
//Para acceder a un metodo estatico. nombre de la clase dos puntos y nombre del metodo statico
echo "<p>Cuadrado de un cateto: ".Triangulo::getCuadrado($cateto)."</p>";

//Eliminamos el objeto triangulo
//unset($triangulo);
$triangulo = null;

print_footer();

?>