<?php
include "biblioteca.php";
//Recoger los datos del formulario "formulario.html"
//print_r($_REQUEST);// si es con metodo GET <form action="hipotenusa.php" method="GET">
//print_r($_POST);//si es con metodo POST <form action="hipotenusa.php" method="POST">

//Se suele comprobar antes de recoger el valor, si el valor no esta vacio
//(O mejor dicho si una variable contine valor)
 print_head("Calculo de hipotenusa:");
if(isset($_REQUEST['cateto1'])&& isset($_REQUEST['cateto2'])){//Comprueba que las variables tenga algun valor isset
    $cateto1 =$_REQUEST['cateto1'];//_REQUEST Recoge el valor
    $cateto2 =$_REQUEST['cateto2'];
    echo "La hipotenusa es: ".hipotenusa($cateto1,$cateto2)."</p>";//llamada al metodo
}
else
    echo"<p>Error en el cálculo de la hipotenusa</p>";

    //Imprime pie de pagina( necesario para formar el documento html)
    print_footer();
    
    function hipotenusa($cateto1, $cateto2){
        //la raiz cuadrada usamos la funcion sqrtl();
        //La potencia usamosla funcion pow(variable,a que la elevamos);
        return sqrt(pow($cateto1,2)+pow($cateto2,2));
    }

?>