
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">     
<?php
include_once("cuerpohtml.php");
$arrayComidasDisponibles =array(
"1ºMacarrones.<br>2ºFajitas.<br>3ºMini peras.",
"1ºPuchero.<br>2ºTortilla francesa.<br>3ºPetit-suisses.",
"1ºPuchero.<br>2ºHamburguesa.<br>3ºPlatano.",
"1ºSopa de Fideos.<br>2ºArroz con pollo.<br>3ºMandarina.",
"1ºGazpachuelo.<br>2ºHuevo frito con patatas.<br>3ºYogur.",
"1ºEmblanco.<br>2ºArroz al curry.<br>3ºPera.",
"1ºRamen.<br>2ºLasaña.<br>3ºMelocotón.",
"1ºEnsalada.<br>2ºFlamenquín.<br>3ºNispero.",
"1ºPure de verdura.<br>2ºSolomillo de pavo.<br>3ºSandía.",
"1ºVegetal.<br>2ºTortilla de jamón.<br>3ºNueces.",
"1ºLentejas.<br>2ºTortilla.<br>3ºManzana.");

$arrayColoresFondo=array(
    "p-3 mb-2 bg-primary text-white",
    "p-3 mb-2 bg-secondary text-white",
    "p-3 mb-2 bg-danger text-white",
    "p-3 mb-2 bg-warning text-dark",
    "p-3 mb-2 bg-info text-white",
    "p-3 mb-2 bg-light text-dark",
    "p-3 mb-2 bg-dark text-white",
    "p-3 mb-2 bg-transparent text-dark",
    "p-3 mb-2 bg-white text-dark"
 
);

//Crea la estructura de la tabla con lo datos de un Array pasado por parametros, y el array de colores
function CreaTabla($arrayComidaSemana,$arrayColorines){
    $arrayDiasSemana =array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
        //---------Creacion Tabla  (style=\"width:80%\")omitido...--------//
        echo"<table border=\"1\" class='table'>";

        //Titulos de dias de la semana    
        echo"<tr <div class=\"p-3 mb-2 bg-success text-white\"/>";//Fila Titulos
        for ($j=0; $j <count($arrayDiasSemana) ; $j++) { 
            echo"<th>$arrayDiasSemana[$j]</th>"; //Titulos    
        }
        echo"</tr>"; 

            echo"<tr>";//fila celdas 
            for ($k=0; $k <=6 ; $k++) { 
                $random = rand(0,8);//numero aleatorio para coger un color
                echo"<td <div class='$arrayColorines[$random]'>$arrayComidaSemana[$k]</td>"; //celda "la D tenemos que sustituirlo por el valor d euna variable que contenga numero de dias y comida
            }
            echo"</tr>";  
      
        echo"</table>";
    
    }
    
    //Prepara un array de comida aleatoria sin repeticion
    function preparacionComidaSemana($arrayComidas,$arraycolores){
    
        $permitido = true;//flag
        $j=0;
        $arrayComidaSinrepeticion=array();
        
        //Rellena el arrayComidaSinrepeticion con alimentos sin repeticion
        while (count($arrayComidaSinrepeticion)<7) 
        { 
           $numerAlea = rand(0,9);
           if(count($arrayComidaSinrepeticion)>0)//cuando ya hay al menos un elemento en el array arrayComidaSinrepeticion
           {
             for ($k=0; $k <count($arrayComidaSinrepeticion); $k++) 
             { 
                if($arrayComidaSinrepeticion[$k]==$arrayComidas[$numerAlea])//Si esta el elemento ya repetido en ambos arrays
                {
                    $permitido = false;
                    break;
                }
                else
                {
                    $permitido = true;
                }     
             }
        
           }
           if($permitido==true)
           {
           $arrayComidaSinrepeticion[$j]=$arrayComidas[$numerAlea];
           $j++;
           }
           
        }

        CreaTabla($arrayComidaSinrepeticion,$arraycolores);

    }
    

print_head("Menú de la semana:");
?>
         </div>
    </div>
</div>

<!--Centrado de componentes-->
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
<!--Creacion de boton de formulario centrado de componentes-->
            <form action="menu.php" method="GET">
                <p><input type="submit" name="enviar" value="Generar un menu semana" class="btn btn-primary"></p>  
            </form>
         </div>
    </div>
</div>

<!--Centrado de componentes-->
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
<?php
//Comprobamos si es distinto de null
if(isset($_REQUEST['enviar']))//Comprueba si el boton se ha pulsado
{
    preparacionComidaSemana($arrayComidasDisponibles,$arrayColoresFondo);
}
?>
         </div>
    </div>
</div>

<br>
<!--Centrado de componentes-->
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
<?php
//Mostramos solo el nombre del mes y el año actuales.
 $mes=time();
 echo "<h3>".date("F-Y",$mes)."</h3> <br>";

print_footer();
?>
         </div>
    </div>
</div>
