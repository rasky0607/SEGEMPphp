<?php
    include_once "app.php";
    $app = new App();
    $app->validateSession();
    App::print_head("Gestión de asuencias");
    App::print_nav_ausencias();
    
    $resultsset = $app->getAbsences();
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
            echo"<p>No hay ausencias</p>"; 
        }
    }
    App::print_footer();
?>
