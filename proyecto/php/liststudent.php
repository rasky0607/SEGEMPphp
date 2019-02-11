<?php
    include_once("app.php");
    $app = new App();
    $app->validateSession(); //Esta función inicia sesión y comprueba si está logueado.
    App::print_head("Listado Alumnos");
    App::print_nav_listalumnos();
    $resultset=$app->getStudents();
    //1. Error con la BD
    if (!$resultset)
        echo "<p>Error al conectar al servidor: ".$app->getDao()->error."</p>";
    //2. La sentencia es correcta
    else
    {
        $list=$resultset->fetchAll();
        //print_r($list);
        //2.1 Si no hay elementos
        if (count($list)==0)
            echo "<p>No hay alumnos matriculados</p>";
        //2.2 Hay alumnos
        else
        {
            echo "<table border=\"1\" class=\"table table-striped table-dark table-bordered\>";
            echo "<tr <div class=\"p-3 mb-2 bg-success text-white\">";
            for ($i=0; $i < $resultset->columnCount(); $i++)
            {
                $nameColumn=$resultset->getColumnMeta($i);
                echo "<th>".strtoupper($nameColumn['name'])."</th>";
            }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($list as $fila) {
                echo "<tr>";
                echo "<td scope=\"row\"> <a href='listabsenceone.php?id_alumno=".$fila['id']."'/>".$fila['id']."</td>".
                "<td scope=\"row\">".$fila['dni']."</td>".
                "<td scope=\"row\">".$fila['nombre']."</td>".
                "<td scope=\"row\">".$fila['correo']."</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        }
    }
    App::print_footer();
?>