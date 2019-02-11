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
      <h1>Mi titulo</h1>      
    </header>    
    <nav>
    </nav>
    <section>
        <article>
        <!--Esta etiqueta es de php y es imprescindible-->
        <?php
        /**
         * Documentacion PhpDocument "similar a javaDoc"
         * Primer ejercicio de estudio PHP
         * @author Pablo Lopez Santana
         * @license https://www.gnu.org/licenses/gpl.txt
         * @version 07/11/2018
         */
        print("<h2>Esto es un print()...</h2>");
        echo("<h3> esto es un echo()....</h3>");

        /**
         * A continuacion se estudiara que cuando se itroduce 
         * una variable entre comillas
         * dobles se interpreta el contenido.
         * Las comillas simples no interpretan el contenido.
         */
        //Definicion de una variable
        $saludo="Hola caracola";
        $pregunta="¿Como estas?";

        echo "<h3>$saludo</h3>";//La comillas dobles SI interpreta el contenido de la variable
        echo '<h3>$pregunta</h3>';//La comillas simple NO interpreta el contenido de la variable
        //Concatenacion de cadenas
        echo "<h3>".$saludo.$pregunta."</h3>";
        echo '<h3>'.$saludo.$pregunta.'</h3>';
        ?>
            <p>Este es el contenido principal de mi web</p>

            <!--Abreviatura de la etiqueta < ?php ?>estructura php-->
          <?= "<h4>Bien, muy bien <h4>"?>  

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