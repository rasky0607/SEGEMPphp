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
    <h2>Matrices en php</h2>
    <?php
    //Notacion compacta en la inicializacion de la matriz, es decir se usan lo[]
    //Podemos tener en una misma matriz varios tipos de datos como enteros y strings
        $personajes=["Santiago","Ramon y cajal",1932];
        print "<p>$personajes[0] $personajes[1] nació en $personajes[2]</p>";

        //Array o matrices ASOCIATIVOS con notacion compacta
        $asociativo =["nombre"=>"Santiago","apellidos"=>"Ramon y Cajal","anyo"=>1932];

         //Array o matrices ASOCIATIVOS MULTIDIMENSIONAL con notacion COMPACTA
         echo "<h4> Declaracion de array Asociativos con notacion Compacta.</h4>";
        $asociativomulti =[
                    ["nombre"=>"Santiago","apellidos"=>"Ramon y Cajal","anyo"=>1932],
                    ["nombre"=>"Juan","apellidos"=>"Bartolome","anyo"=>"2010"]];

                    //Mostrar el contenido de el array 
                    //print_r necesita echo para pintarse
                    //echo con la etiqueta "<pre>" da un salto de linea a cada valor de el array
                  echo "<pre>";
                    print_r($asociativomulti);
                  echo "</pre>";

                  //Declaracion de un array con notacion NO COMPACTA
                  echo "<h4> Declaracion de array Asociativos con notacion No Compacta.</h4>";
        $asociativomulti2 =array(
                    array("nombre"=>"Santiago","apellidos"=>"Ramon y Cajal","anyo"=>1932),
                    array("nombre"=>"Juan","apellidos"=>"Bartolome","anyo"=>"2010"));

                    echo "<pre>";
                    print_r($asociativomulti2);
                  echo "</pre>";

                  //En los array multidimensionales hay que concatelar los valores a la hora de hacer un echo
                  //En este casola key del primer arry es "nombre",el cual pro casualidad en el segundo tambien.
                  echo "<h4> Concatenacion de array multidimensionales.</h4>";

                  echo "<p>El segundo medico es: ".$asociativomulti2[1]["nombre"]."</p>";

                  //Array mixtos
                  /**Si varios elementos utilizan la m isma key, solo será valido el ultimo key,
                  Ya que php convierte las key a un entero.*/
                  echo "<h4> Array mixtos.</h4>";
                  
                  $abecedario=array(
                      1=>"a",
                      "1"=>"b",
                      1.5=>"c",
                      true=>"d"
                  );
                  //En este caso todas las key se se convierten a 1 y se quedara con la ultima key osea con "d"
                  echo"<p>El abecedario comienza por: ".print_r($abecedario,true)."</p>";
                //PHP no distingue entre array indexados (con key numerica y en orden) con asociativos.
                $arraymixto=array(
                    "uno"=>"a",
                    "dos"=>"b",
                    100=>"c",
                    101=>"d",
                    -102 =>"f"
                );
                echo "<p>".print_r($arraymixto,true)."</p>";

                echo "<h4> Array mixtos sin indicarle su key, php lo hara automaticamente.</h4>";
                $arraymixto2=array(
                    "a",
                    "b",
                    7=>"c",
                    8=>"d",
                    9=>"f"
                );
                echo "<p>".print_r($arraymixto2,true)."</p>";

                //Añadir otro array a uno ya existente o elementos a un array nuestro "ADD()"
                
                // Con los corchetes se añaden al array ya existente ($arraymixto2). Añadir elementos
                echo "<h4>Añadir un array a otro ya existente o otros elementos \"nuestro ADD\".</h4>";
                $arraymixto2[]=array();
                $arraymixto2[]=array(1,2,3);
                echo "<pre>".print_r($arraymixto2, true)."</pre>";


                //Recordar un array con foreach.
                /***Para recorrer un array, no utilizamos el for, sino que usamos el foreach
                 *Debido ala peculiaridad que a menudo su key no es numerica.
                 "Siempre que salga el error Ofset es que estamos accediendo a una posicion n o definida"
                */
                echo "<h4>Recorrer un Array con FOR que da problemas.</h4>";
                echo "<p>Numero de elementos del array es: ".count($arraymixto2)."</p>";
                for ($i=0;$i<count($arraymixto2);$i++)
                 echo "<p>Posicion: ".$i." contiene: ".$arraymixto2[$i]."</p>";

                 echo "<h4>Recorrer un Array con FOREACH.</h4>";

                 $i=0;
                 foreach($arraymixto2 as $elemento){
                     if(!is_array ($elemento))
                        echo"<p>Posicion: ".$i." contiene: ".$elemento ."</p>";
                     else
                     echo"<p>Posicion: ".$i." contiene: ".print_r($elemento)."</p>";

                     $i++;
                 }
                 //Funcion de copiar Array
                 echo "<h4>Copiamos un Array.</h4>";
                 $copia =$arraymixto2;
                 print_r($copia);

                 //Funcion de elminar un elemento concreto de el Array unset($array[key])
                 echo "<h4>Elimienar un elemento concreto de el Array.</h4>";
                 unset($arraymixto2[11]);
                 print_r($arraymixto2);
                 //Funcion eliminar un array entero unset($nombrearray) 
                 //"unset() realmente elimina un valor de memoria"
                 echo "<h4>Eliminar el Array entero.</h4></br> *Esto dara un error por que la variable ya no existe en memoria.</br>";
                 unset($arraymixto2);
                 //Esto debera dar un ERROR por que ya no existe esa variable en memoria
                 print_r($arraymixto2);

                 //Funciones de Odenacion Array "Primero lo convierte aun array indexado y luego lo ordena"
                 echo "<h4>Ordena el Array.</h4></br> *sort() primero indexara el array al completo y luego lo ordenara. </br></br>";
                sort($copia);
                print_r($copia);
                 //Comprobar si un elemento esta en un array in_array(5,$c$nombreDeElArray)
                 echo "<h4>Comprobar si hay un valor en el Array.</h4></br> *in_array() devolvera un true o false \"1,0\" si esta o no. </br></br>";
                 echo"<p> El valor 5 ".in_array(5,$copia)." está en el array </p>";
                  //Comprobar si un elemento esta en un array in_array(5,$c$nombreDeElArray)
                  echo "<h4>Comprobar si hay una key existe en el Array.</h4></br> *key_exists() devolvera un true o false \"1,0\" si esta o no. </br></br>";
                  echo"<p> La key 3 ".key_exists(3,$copia)." está en el array </p>";
 



                


         
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