<?php
include ("dao.php");
class App{
private $dao;

function __construct()
{
  $this->dao=new Dao();
}

    //$title ="Página SEGEMP" es el valor por defecto indicado a este parametro si n o sele pasa nada
function print_head($title="Página SEGEMP"){
  //Cambiamos el enlace de <link href=\"../css/bootstrap.css\" rel=\"stylesheet\"/>    
    echo "<!DOCTYPE html>
    <html lang=\"es\">  
      <head>    
        <title>$title</title>    
        <meta charset=\"UTF-8\">
        <meta name=\"title\" content=\"$title\">
        <meta name=\"description\" content=\"Descripción de la WEB\">    
        <link href=\"../css/bootstrap.css\" rel=\"stylesheet\"/>  
        <link href=\"../css/aula.css\" rel=\"stylesheet\"/>
        <script src=\"../js/jquery-3.3.1.js\"></script>
        <script type=\"text/javascript\" src=\"../js/bootstrap.js\"></script>
        <script type=\"text/javascript\" src=\"../js/bootstrap.min.js\"></script>
        <script type=\"text/javascript\" src=\"../js/bootstrap.bundle.js\"></script>
        
      </head>  
      <body style=\"background-color:#66ffa6\">    
        <header>
       
       
        </header> ";
        /*  <header>       
            <h1 class=\"text-center\">$title</h1>
            </header>  */ 
    }

    function print_head_login($title="Página SEGEMP"){
      //Cambiamos el enlace de <link href=\"../css/bootstrap.css\" rel=\"stylesheet\"/>    
        echo "<!DOCTYPE html>
        <html lang=\"es\">  
          <head>    
            <title>$title</title>    
            <meta charset=\"UTF-8\">
            <meta name=\"title\" content=\"$title\">
            <meta name=\"description\" content=\"Descripción de la WEB\">    
            <link href=\"../css/bootstrap.css\" rel=\"stylesheet\"/>  
            <link href=\"../css/aula.css\" rel=\"stylesheet\"/>
            <script src=\"../js/jquery-3.3.1.js\"></script>
            <script type=\"text/javascript\" src=\"../js/bootstrap.js\"></script>
            <script type=\"text/javascript\" src=\"../js/bootstrap.min.js\"></script>
            <script type=\"text/javascript\" src=\"../js/bootstrap.bundle.js\"></script>
            
          </head>  
          <body style=\"background-color:#bbdefb\">       
            <header>         
            </header>
            <br/> ";

  
        }

        //Funcion que imprime el menú del sitio web
      function print_nav_ausencias(){
        echo"      
        <div class=\"p-1 mb-2 bg-success text-white\"/>
        <nav class=\"navbar navbar-expand-lg navbar-dark\">              
        <span class=\"navbar-brand mb-0 h1\"><u>Ausencias:</u></span>
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
            <ul class=\"navbar-nav mr-auto\">
        
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"listabsenceAll.php\">Listado de ausencias <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"nav-item dropdown\">
            <span class=\"nav-item active\"> <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\"
                 data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Gestión de ausencias
                </a></sapn>
                <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                    <a class=\"dropdown-item disabled\" data-toggle=\"modal\" href=\"#\">Alta ausencia</a>
                    <a class=\"dropdown-item disabled\" href=\"#\">Editar ausencia</a>
                    <a class=\"dropdown-item\" href=\"formSearchAbsenDate.php\">Filtrar ausencias</a>
                </div> 
                </li>                                 
              </li>
              <li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"liststudent.php\">Listado de alumnos <span class=\"sr-only\">(current)</span></a>
          </li>            
            </ul>
           <span class=\"navbar-brand mb-0 h1\"><a class=\"nav-link\" href=\"logout.php\">Cerrar sesión</a></span>
          </nav> 
          </div>";
        }

         //Funcion que imprime el menú del sitio web
      function print_nav_listalumnos(){
          echo"       
          <div class=\"p-1 mb-2 bg-success text-white\"/>
          <nav class=\"navbar navbar-expand-lg navbar-dark\">              
          <span class=\"navbar-brand mb-0 h1\"><u>Alumnado:</u></span>
          <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
              <ul class=\"navbar-nav mr-auto\">
              <li class=\"nav-item dropdown\">
              <span class=\"nav-item active\"> <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\"
                   data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                  Gestión de Alumnos
                  </a></sapn>
                  <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                      <a class=\"dropdown-item disabled\" data-toggle=\"modal\" data-target=\"#exampleModal\" href=\"#\">Alta alumno</a>
                      <a class=\"dropdown-item disabled\" href=\"#\">Editar alumno</a>
                      <a class=\"dropdown-item\" href=\"consultabsence.php\">Consultar Alumno</a>
                  </div> 
                  </li>                                 
                </li>
                <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"listabsenceAll.php\">Listado de ausencias <span class=\"sr-only\">(current)</span></a>
            </li>            
              </ul>
             <span class=\"navbar-brand mb-0 h1\"><a class=\"nav-link\" href=\"logout.php\">Cerrar sesión</a></span>
            </nav> 
            </div>";   
          }
    
        //Funcion que imprime el pié de página del sitio Web
      function print_footer(){
       echo "<footer>
          <h4 class=\"text-center\">Pablo López</h4>
          <a href='http://dominio.com/aviso-legal'>Política de cookies</a>
          <h4>Redes sociales</h4>
          <a href='http://facebook.com/mi-pagina-de-facebook'>Mi Facebook</a>
        </footer>";
        }

        function print_nav_ausenciasSearchDateRanged(){
          echo"      
          <div class=\"p-1 mb-2 bg-success text-white\"/>
          <nav class=\"navbar navbar-expand-lg navbar-dark\">              
          <span class=\"navbar-brand mb-0 h1\"><u>Ausencias:</u></span>
          <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
              <ul class=\"navbar-nav mr-auto\">
          
              <li class=\"nav-item active\">
                  <a class=\"nav-link\" href=\"listabsenceAll.php\">Volver a todas las ausencias <span class=\"sr-only\">(current)</span></a>
              </li>
              <li class=\"nav-item dropdown\">
              <span class=\"nav-item active\"> <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\"
                   data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                  Gestión de ausencias
                  </a></sapn>
                  <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                      <a class=\"dropdown-item disabled\" data-toggle=\"modal\" href=\"#\">Alta ausencia</a>
                      <a class=\"dropdown-item disabled\" href=\"#\">Consultar ausencias de un dia</a>
                      <a class=\"dropdown-item\" href=\"formSearchAbsenDate.php\">Volver a filtrar</a>
                  </div> 
                  </li>                                 
                </li>
                <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"liststudent.php\">Listado de alumnos <span class=\"sr-only\">(current)</span></a>
            </li>            
              </ul>
             <span class=\"navbar-brand mb-0 h1\"><a class=\"nav-link\" href=\"logout.php\">Cerrar sesión</a></span>
            </nav> 
            </div>";
          }
  
       

        //Funcion que imprime un formulario para buscar los alumnos que han faltado en un rango de fechas
      function print_search_date_range_absen_student(){


        }


        //Funcion que devuelve la unica conexion a la BD
      function getDao(){
          return $this->dao;
        }

      function validateSession(){
          session_start();
          if (!$this->isLogged())
              $this->showLogin();
      }
      //Función que comprueba si existe el usuario
      function isLogged(){
          return isset ($_SESSION['user']);
      }
      //Función que redirige a a Login
      function showLogin(){
          //Petición a una cabecera.
          header ('Location: login.php'); //Solo se puede utilizar cuando no se ha escrito nada ni se ha mandado una petición al cliente.
      }
      

        //Funcion que guarda el nombre de usuario en la variable
        //$_SESSION cuando el usuario ha iniciado sesion en login.php
        function saveSession($user){
          $_SESSION['user']=$user;
        }

        function invalidateSession(){
          session_start();
          if ($this->isLogged())
              unset($_SESSION['user']);
          session_destroy();
          $this->showLogin();
      }

      //Función que devuelve todos los estudiantes dados de alta
      function getStudents(){
          return $this->dao->getStudents();
      }

      //Funcion que devuelve todas las ausencias de todos los alumnos
      function getAbsences(){
        return $this->dao->getAbsences();
    }

    //Funcion que devuelve todas las ausencias dado el ide de un alumno
    function getAbsencesFrom($idStudent){
        return $this->dao->getAbsencesFrom($idStudent);
    }

    function getAbsencesFromDateRanged($idStudent,$fechadesde,$fechahasta,$modulo){
      return $this->dao->getAbsencesFromDateRanged($idStudent,$fechadesde,$fechahasta,$modulo);
    }

    function getAbsencesFromDateRangedNoModulo($idStudent,$fechadesde,$fechahasta){
      return $this->dao->getAbsencesFromDateRangedNoModulo($idStudent,$fechadesde,$fechahasta);
    }

    function getAbsencesFromDateRangedNoFechaHasta($idStudent,$fechadesde,$modulo){
      return $this->dao->getAbsencesFromDateRangedNoFechaHasta($idStudent,$fechadesde,$modulo);
    }

    function getAbsencesFromDateRangedNoFechaDesde($idStudent,$fechahasta,$modulo){
      return $this->dao->getAbsencesFromDateRangedNoFechaDesde($idStudent,$fechahasta,$modulo);
    }
    
    function getAbsencesFromDateRangedNoId($fechadesde,$fechahasta,$modulo){
      return $this->dao->getAbsencesFromDateRangedNoId($fechadesde,$fechahasta,$modulo);
    }
    
    function getAbsencesFromDateRangedOnlyFechaHasta($fechahasta){
      return $this->dao->getAbsencesFromDateRangedOnlyFechaHasta($fechahasta);
    }
    
    function getAbsencesFromDateRangedFechaHastaId($idStudent,$fechahasta){
      return $this->dao->getAbsencesFromDateRangedFechaHastaId($idStudent,$fechahasta);
    }

    function getAbsencesFromDateRangedFechaHastaModulo($fechahasta,$modulo){
      return $this->dao->getAbsencesFromDateRangedFechaHastaModulo($fechahasta,$modulo);
    }

    function getAbsencesFromDateRangedOnlyFechaDesde($fechadesde){
      return $this->dao->getAbsencesFromDateRangedOnlyFechaDesde($fechadesde);
    }
    
    function getAbsencesFromDateRangedFechaDesdeModulo($fechadesde,$modulo){
      return $this->dao->getAbsencesFromDateRangedFechaDesdeModulo($fechadesde,$modulo);
    }
    
    function getAbsencesFromDateRangedFechaDesdeHasta($fechadesde,$fechahasta){
      return $this->dao->getAbsencesFromDateRangedFechaDesdeHasta($fechadesde,$fechahasta);
    }

    function getAbsencesFromDateRangedIdFechaDesde($idStudent,$fechadesde){
      return $this->dao->getAbsencesFromDateRangedIdFechaDesde($idStudent,$fechadesde);
    }

    function getAbsencesFromIdModulo($idStudent,$modulo){
      return $this->dao->getAbsencesFromIdModulo($idStudent,$modulo);
    }
    
    function getAbsencesFromIdFechaHasta($idStudent,$fechahasta){
      return $this->dao->getAbsencesFromIdFechaHasta($idStudent,$fechahasta);
    }
    
    function getAbsencesFromIdFechaDesde($idStudent,$fechadesde){
      return $this->dao->getAbsencesFromIdFechaDesde($idStudent,$fechadesde);
    }

    function getAbsencesFromModulo($modulo){
      return $this->dao->getAbsencesFromModulo($modulo);
    }
    
    
}
?>