<?php
//Para poder acceder a las funciones de otro fichero
//("biblioteca.php" realmente es una ruta relativa, en este caso estamos en el mismo nivel, pero puede estar en otro lugar).
include "biblioteca.php";
//Crear una funcion con la palabra reservada "function"
function hipotenusa($cateto1, $cateto2){
    //la raiz cuadrada usamos la funcion sqrtl();
    //La potencia usamosla funcion pow(variable,a que la elevamos);
    return sqrt(pow($cateto1,2)+pow($cateto2,2));
}
//funcion llamada desde el fichero biblioteca.php
print_head();

//LLamada a funccion hipotenusa
echo"<h2> La hipotenusa de un triángulo.</h2>";
$cateto1=3;
$cateto2=5;
echo "La hipotenusa es: ".hipotenusa($cateto1,$cateto2)."</p>";

//funcion llamada desde el fichero biblioteca.php
print_footer();

?>
</body>
</html>