<?php
    include_once "app.php";
    $app = new App();
    $app->validateSession();
    App::print_head("Asuencias");
    App::print_nav_ausenciasSearchDateRanged();

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $id=$_POST["id"];
        $fechadesde=$_POST["fechad"];
        $fechahasta=$_POST["fechah"];
        $modulo=$_POST["modulo"];
        if(empty($id)&& empty($fechadesde) && empty($fechahasta) && empty($modulo))
        {
            echo "<br/><p class=\"text-center\">¡Deben rellenarse todos los campos!</p>";
        }
        else{
              Busqueda($id,$fechadesde,$fechahasta,$modulo);
        }
}

Function Busqueda($id,$fechadesde,$fechahasta,$modulo)
{
    $app = new App();
    //Esto no es viable...
    #region Propuesta inviable... para filtrar consultas segun el caso..
    if(empty($id))
    {
        $resultsset = $app->getAbsencesFromDateRangedNoId($fechadesde,$fechahasta,$modulo);
    }
    if(empty($fechadesde))
    {
        
        $resultsset = $app->getAbsencesFromDateRangedNoFechaDesde($id,$fechahasta,$modulo);
    }
    if(empty($fechahasta))
    {       
        $resultsset = $app->getAbsencesFromDateRangedNoFechaHasta($id,$fechadesde,$modulo);
    }
    if(empty($modulo))
    {
        $resultsset = $app->getAbsencesFromDateRangedNoModulo($id,$fechadesde,$fechahasta);
    }
#(Modulo)
    //Solo damos id y modulo Ya esta mas abajo
    //Solo damos modulo y fecha hasta Ya esta abajo

  
    //Solo le damos modulo e ID esta en la region de los ID mas abajo

    //Solo damos la modulo o asignatura
    if(empty($id)&&empty($fechahasta)&&empty($fechadesde)&&!empty($modulo))
    {        
        $resultsset = $app->getAbsencesFromModulo($modulo);//FALLA
    }
 #(id)  
    //solo damos  id y fecha desde
    //select  * from falta where  id_alumno=1 and date>="20190214";
    if(empty($fechahasta)&&empty($modulo))
    {       
        $resultsset = $app->getAbsencesFromIdFechaDesde($id,$fechadesde);
    }
    //Solo dados id y fecha hasta
    //select  * from falta where  id_alumno=1 and date<="20190221";
    if(empty($fechadesde)&&empty($modulo))
    {        
        $resultsset = $app->getAbsencesFromIdFechaHasta($id,$fechahasta);
    }

    //Solo dados id y modulo <---
    if(empty($fechadesde)&&empty($fechahasta)&&!empty($id)&&!empty($modulo))
    {            
        $resultsset = $app->getAbsencesFromIdModulo($id,$modulo);
    }    
    //Solo damos el id del alumno
    if(empty($fechadesde)&&empty($fechahasta)&&empty($modulo)&&!empty($id))
    {            
        $resultsset = $app->getAbsencesFrom($id); 
    }

#(Fecha Desde)
    //Solo damos id y fecha desde
    if(empty($fechahasta)&&empty($modulo)&&!empty($id)&&!empty($fechadesde))
    {       
        $resultsset = $app->getAbsencesFromDateRangedIdFechaDesde($id,$fechadesde);   
    }
    //Solo damos las fechas desde y decha hasta <--
    if(empty($id)&&empty($modulo))
    {      
        $resultsset = $app->getAbsencesFromDateRangedFechaDesdeHasta($fechadesde,$fechahasta);   
    }
    //Solo damos fecha desde y modulo
    if(empty($id)&&empty($fechahasta)&&!empty($fechadesde)&&!empty($modulo))
    {
        $resultsset = $app->getAbsencesFromDateRangedFechaDesdeModulo($fechadesde,$modulo);         
    }    
    //solo damos la fecha desde
    if(empty($id)&&empty($fechahasta)&&empty($modulo))
    {
        $resultsset = $app->getAbsencesFromDateRangedOnlyFechaDesde($fechadesde);   
    }
#(Fecha Hasta)
    //solo damos fecha hasta y modulo
    if(empty($id)&&empty($fechadesde)&&!empty($fechahasta)&&!empty($modulo))
    {
        $resultsset = $app->getAbsencesFromDateRangedFechaHastaModulo($fechahasta,$modulo);    
        
    }    
    //solo damos fecha desde y fecha hasta esta ya esta en la region de Fecha Desde
    
    //solo damos fecha hasta y Id
    if(empty($modulo)&&empty($fechadesde)&&!empty($id)&&!empty($fechahasta))
    {             
        $resultsset = $app->getAbsencesFromDateRangedFechaHastaId($id,$fechahasta);      
    }
     //solo damos la fecha hasta
     if(empty($id)&&empty($fechadesde)&&empty($modulo))
    {        
        $resultsset = $app->getAbsencesFromDateRangedOnlyFechaHasta($fechahasta);
    }
 
    #endregion 
    //-------------
    //Si todos los campos estan llenos
    if(!empty($id)&&!empty($fechadesde)&&!empty($modulo)&&!empty($fechahasta))
    {
        $resultsset = $app->getAbsencesFromDateRanged($id,$fechadesde,$fechahasta,$modulo);
    }
    


    if(!$resultsset)
        echo "<p>Error al conectar al servidor: ".$app->getDao()->error."</p>";
    else{
        $list = $resultsset->fetchAll();

         if(count($list) >=1){

            echo "<table class=\"table table-striped table-dark table-bordered\">";
            echo "<thead class\"\">";
            echo "<tr>";
            for ($i=0; $i < $resultsset->columnCount(); $i++) { 
                $columnMeta = $resultsset->getColumnMeta($i);
                echo "<th scope=\"col\">".strtoupper($columnMeta['name'])."</th>";
            }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            $flag = true;
            if(isset($_GET['id_alumno'])){
                $flag = false;
            }
            foreach ($list as $fila) {
                if($flag || $_GET['id_alumno'] == $fila['id_alumno']){
                    echo "<tr>";
                    echo "<td scope=\"row\">".$fila['id_alumno']."</td>".
                    "<td scope=\"row\">".$fila['id_modulo']."</td>".
                    "<td scope=\"row\">".$fila['date']."</td>".
                    "<td scope=\"row\">".$fila['justificada']."</td>".
                    "<td scope=\"row\">".$fila['descripcion']."</td>";
                    echo "</tr>";
                }
            }
            
            echo "</tbody>";
            echo "</table>";
        }
        else if(count($list) <=0)
        {
            echo"<br/><p><h1 class=\"text-center\">No hay ausencias.</h1></p>"; 
        }
    }
}
    App::print_footer();
?>
