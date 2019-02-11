<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>Título de la WEB</title>    
    <meta charset="UTF-8">
    <meta name="title" content="Título de la WEB">
    <meta name="description" content="Descripción de la WEB">    
    <link href="http://dominio.com/hoja-de-estilos.css" rel="stylesheet" type="text/css"/>    
  </head>  
  <body>    
    <header>
      <h1>Hola mundo</h1>      
    </header>    
    <nav>
    </nav>
    <?php
    //Toda variable debe empezar por (mayucula o minuscula) o un guion bajo
    $edad=15;
    $Edad=7;
    $_edad=4;
    //Si el nombre de la variable contiene varias palabras, se debe utilizar notacion Camel Case
    $edadPadre=45;
    $edadHija=7;
    $edadHijo=12;
    $edadMadre ="Me parece son 37";

    //Estudio de las variables de tipo cadenas
    echo "<p>La edad del padre y del hijo son $edadPadre y $edadHijo</p>";
    //Dentro de las cadenas no se realizan operaciones aritsmeticas.
    echo"<p>La suma de los años del padre y la hija es $edadPadre + $edadHija</p>";
    //Dentro de las cadenas podemos realizar operaciones aristmeticas SI concatenamos (Se recomiendan los parentesis)
    echo"<p>La suma de los años del padre y la hija es ".($edadPadre + $edadHija)."</p>";
    //Para escapar un caracter especial se usa la barra \:
    echo"<p>La suma de los \"años\" del padre y la hija es ".($edadPadre + $edadHija)."</p>";
    //Se concatena una cadena con otra mediante el operador .= similar a un +=  (el \n es un salto de line aun que la mayoria de navegadores lo omiten)
    echo"<p>---</p>";
    $printEdadPadre="\nLa edad del padre es: ".$edadPadre;
    echo $printEdadPadre;
    $printEdadPadre .= "La edad del hijo es: ".$edadHijo;
    echo $printEdadPadre;
    //Resumen variables
    $numero=500;
    $cadena="Son texto";
    $unArraySemana =["lunes","martes","miercoles","jueves","viernes"];
    echo"<p>El numero es: $numero,<br>El texto es: $cadena,<br>y hoy es $unArraySemana[1]</p>";

    //Declaracion de un Array multidimensional:
    $unArrayDeDosDimensiones=[["Hola","Hello"],["Adios","Bye"]];
    //Dara error
    //echo"<p>$unArrayDeDosDimensiones[0][0] Don pepito,$unArrayDeDosDimensiones[1][0] Don jose </p>";
    //Solucion 1
    echo"<p>{$unArrayDeDosDimensiones[0][0]} Don pepito,{$unArrayDeDosDimensiones[1][0]} Don jose </p>";
    //Solucion 2 (Lo normal es concatenar como en esta solucion)
    echo"<p>".$unArrayDeDosDimensiones[0][1]." Don pepito, ".$unArrayDeDosDimensiones[1][1]." Don jose </p>";

    //VARIABLES BOOLEAN false(0) y true(1) 
    //Todo lo que no sea CADENA VACIA sera true, en el caso de la CADENA VACIA sera false
    $autorizado=0;
    if($autorizado)
        echo"<p><h4>Usted está autorizado</h4></p>";
    if(!$autorizado)
        echo"<p><h4>Usted NO está autorizado</h4></p>";

    //Variables predefinidas del servidor
    echo"<p><h2>VARIABLES PREDEFINIDAS</h2></p>";
    echo print_r($_SERVER);


    


    ?>
    <section>
        <article>
            <p>Este es el contenido principal de mi web</p>
        </article>
    </section>
    <footer>
      <h4>Avisos legales</h4>
      <a href="http://dominio.com/aviso-legal">Política de cookies</a>
      <h4>Redes sociales</h4>
      <a href="http://facebook.com/mi-pagina-de-facebook">Mi Facebook</a>
    </footer>
  </body>  
</html>