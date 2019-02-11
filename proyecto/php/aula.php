<?php
include_once("app.php");
session_start();
App::print_head("Gestion de aula");
App::print_nav();
echo "Gestiones.";
App::print_footer();
?>