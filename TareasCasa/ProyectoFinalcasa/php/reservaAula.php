<?php
include_once("app.php");
App::print_head("Reserva Aula");
App::print_nav_listaulas();
echo"<br/> <h1 class=\"text-center\">Reserva Aula:</h1>";
$app=new App();
$app->validateSession();
$listAulas = $app->getAulas();
$listAulas=$listAulas->fetchAll();

//var_dump($nik);

?>
<br/>
<div class="container">
    <div class="row">
    <!--col-md- lo que ocupa los componentes de la pagina -->
    <!--offset-md- numero de columnas que debe dejar en los marjenes -->
        <div class="col-12 col-md-4 offset-md-4">            
            <form method="POST" action="reservaAula.php">                       
                <div class="from-group">
                    <label for="nombreAula">Nombre Aula:</label>                    
                    <select class="form-control" name="nombreCorto" id="nombreCorto" autofocus="autofocus">
                    <?php
                    foreach ($listAulas as $item) {
                    echo "<option value=".$item['nombreCorto'].">".$item['nombreCorto']."</option>";
                    }
                    ?>
                </select>
                </div>
                <div class="from-group">
                    <label for="freserva">Fecha reserva:</label>
                    <input id="freserva" name="freserva" type="date" autofocus="autofocus" requiered="requiered" class="form-control">
                </div>
                <div class="from-group">
                    <label for="horaIniresr">Hora inicio de reserva:</label>
                    <select class="form-control" name="horaIniresr" id="horaIniresr" autofocus="autofocus">                  
                    <option value="8:15">8:15</option>
                    <option value="9:15">9:15</option>
                    <option value="10:15">10:15</option>
                    <option value="11:15">11:15</option>
                    <option value="11:45">11:45</option>
                    <option value="12:45">12:45</option>
                    <option value="13:45">13:45</option>
                    <option value="14:45">14:45</option>
                 </select>
                </div>
                <div class="from-group">
                    <label for="horaFinreser">Hora fin de reserva:</label>                  
                    <select class="form-control" name="horaFinreser" id="horaFinreser" autofocus="autofocus">               
                    <option value="8:15">8:15</option>
                    <option value="9:15">9:15</option>
                    <option value="10:15">10:15</option>
                    <option value="11:15">11:15</option>
                    <option value="11:45">11:45</option>
                    <option value="12:45">12:45</option>
                    <option value="13:45">13:45</option>
                    <option value="14:45">14:45</option>
                    </select>
                </div>  
                <br/>
                <div class="text-center">
                    <input type="submit" value="Reservar" class="btn btn-primary">
                </div>
                <hr/>                
            </form>
        </div>
    </div>
</div>
<?php
App::print_footer();

if($_SERVER["REQUEST_METHOD"]=="POST")
{  
    
    $nik;
    foreach($_SESSION as $elemento){
        $nik=$elemento;
    }
      
    /**
     * 
     * Reserva de aula cogiendo el usuario que inicio sesion 
     * Mostrar reservas de un aula concreta
     * Consultar mis reservas cone l usuario que inicio sesion
     */


}

?>