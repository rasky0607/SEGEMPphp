<?php
    include ("biblioteca.php");
    session_start();
    session_destroy();

    echo "<p>Acabas de cerrar sesión.</p>";
    echo "<p><a href='sesiones.php'>Iniciar sesión</a></p>";
?>