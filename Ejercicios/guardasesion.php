<?php
session_start();
if (isset($_POST['nombre'])){
    // Se realiza la comprobación en la BD que el usuario tiene permisos.
    $_SESSION['nombre']=$_POST['nombre'];
    echo "<p>Has iniciado sesión con: ".$_SESSION['nombre']."</p>";
}else{
    echo "<p>Acceso restringido</p>";
}

echo "<p><a href='sesiones.php'>Ir a sesiones.php</a></p>";

?>