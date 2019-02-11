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
    /*Orden de las constantes.
    En primer lugar se incluye los ficheros mediante include(...)
    En segundo lugar se declara las constantes "Distingue entre mayusculas y minusculas" */

        //CONSTANTES (NO se puede redefinir una constante una vez declarada.
    //Definir constantes 
    define("TRIANGULO",1);
    define("CUADRADO",2);
    define("RECTANGULO",2);

    //Distingue entre mayusculas y minusculas
    define("rectangulo",5);

    //Hacer uso de const
    const PI =3.14;

    //Creacion de una clase en php
    class Figura{
      //El uso de const se utiliza dentro de las clases
      const R = 2.5;
    }
    //Imprimir el valor de las constantes:
    echo("<p>El valor de RECTANGULO es:".RECTANGULO."</p>");
    echo("<p>El valor de rectangulo es:".rectangulo."</p>");
    //Es que las constantes nos e interpretan dentro de las comillas dobles
    echo("<p>El valor de pi es PI");

    /*Hay constantes definidas ene l sistema o mejor dicho en el servidor en un array 
    print_r -> para imprimir el contenido de un array*/
    //print_r(get_defined_constants()); COMENTADO POR LIMPIEZA DE PANTALLA AL VISUALIZAR EL EJEMPLO

    $array_constants = get_defined_constants();
    //Al nombre de la constante NO se accedepor posiciones si no por el nombre 
    echo ("<p>El valor de la constante E-ERROR es: ".$array_constants['E_ERROR']."</p>");
    //Hay variables que define el valor maximo de un entero
    echo ("<p>El valor maximo de  un INT es ".(PHP_INT_MAX)."</p>");
    echo ("<p>El valor maximo de  un INT +1 es ".(PHP_INT_MAX+1)."</p>");
    //Conversion explicita
    echo ("<p>El valor maximo de  un INT +1 es ".(int)(PHP_INT_MAX+1)."</p>");

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