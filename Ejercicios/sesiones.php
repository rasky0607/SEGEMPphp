<?php
include ("biblioteca");

// Después de los include.
session_start();

if (isset($_SESSION['nombre'])){
    echo "<p>Has iniciado sesión con: ".$_SESSION['nombre']."</p>";
    echo "<p><a href='cerrarsesion.php'>Cerrar sesión</a></p>";
}else{
    echo "<h2>Ejercicio con sesiones</h2>";

?>
<form action="guardasesion.php" method="POST">
    <p>Nombre: <input type="text" name="nombre" required="required"/></p>
    <p><input type="submit" name="Enviar"/>
</form>


<?php
}
?>