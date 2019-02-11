<?php
include_once("app.php");
App::print_head("Ausencias en una fecha.");
$app = new App();
$app->validateSession();
?>
<br/>

<div class="container">
    <div class="row">
    <!--col-md- lo que ocupa los componentes de la pagina -->
    <!--offset-md- numero de columnas que debe dejar en los marjenes -->
    <div class="col-30 col-md-20 offset-md-5">
        <form method="POST" action="searchAbsenDate.php">
        <label for="id">Id estudiante:</label>
        <input id="id" name="id" type="number" autofocus="autofocus" requiered="requiered" class="form-control">
            <hr/>               
                <div class="from-group">
                    <label for="fecha">Fecha desde:</label>
                    <input id="fechad" name="fechad" type="date" autofocus="autofocus" requiered="requiered" class="form-control">
                    <br/>
                    <label for="fecha">Fecha hasta:</label>
                    <input id="fechah" name="fechah" type="date" autofocus="autofocus" requiered="requiered" class="form-control">

                    <label for="modulo">Asignatura:</label>
                    <input id="modulo" name="modulo" type="number" autofocus="autofocus" requiered="requiered" class="form-control">
                    <hr/>
                    <div class="text-center">
                         <input type="submit" value="Buscar" class="btn btn-primary">                                        
                   </div>
                </div>
    </div>

</form>
</div>

<?php



App::print_footer();

?>