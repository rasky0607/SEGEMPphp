<?php

//Clase que va gestionar la conexion a la base dedatos
define("DATABASE","reserva_aula");
define("DSN","mysql:host=localhost;dbname=".DATABASE);
define("USER","root");//usuario de mysql
define("PASSWORD","123");
//Definimos las tablas con sus columnas
define("TABLA_USUARIO","usuario");
define("USUARIO_COLUMN_NICK","nick");
define("USUARIO_COLUMN_CONTRASENIA","contrasenia");
define("USUARIO_COLUMN_NOMBRE","nombre");
define("USUARIO_COLUMN_FNAC","fnac");
define("USUARIO_COLUMN_EMAIL","email");

define ("TABLA_AULA", "aula");
define ("AULA_COLUMN_NOMBRE_AULA", "nombreCortoAula");
define ("AULA_COLUMN_TIC", "tic");//Pertenece o no el aula al tipo de aula de tecnologia o las TIC

define ("TABLA_RESERVA", "reserva");
define ("RESERVA_COLUMN_NICK_USUARIO", "nickUsuario");
define ("RESERVA_COLUMN_NOMBRE_AULA", "nombreCortoAula");
define ("RESERVA_COLUMN_FECHA","fReserva");
define ("RESERVA_COLUMN_HORA","hora");


class Dao{
    private $conecxion;
    public $error;
    function __construct()
    {
        try
        {
           $this->conecxion=new PDO(DSN,USER,PASSWORD);//devuelve un objet conexcion
        }
        catch(PDOEXception $e)
        {
            $this->error="Error en la conecxion: ".$e->getMessage();//deveulve el error
        }
    }

    //Metodo que comprueba si hay una conexion con la BD
    function Conectado()
    {
        return isset($this->conecxion);
    }

    //Funcion que compruebasi existe el usuario en la tabla User

    function validarUsuario($usuario,$password){
        //$sql="SELECT * FROM ".TABLE_USER." WHERE ".COLUMN_USER_NAME."='".$user."' AND ".COLUMN_USER_PASSWORD." =sha1('".$password."')";
        $sql="SELECT * FROM ".TABLA_USUARIO." WHERE ".USUARIO_COLUMN_NICK."='".$usuario."' AND ".USUARIO_COLUMN_CONTRASENIA." ='".$password."'";
        //echo $sql;     
        $statement=$this->conecxion->query($sql);
        if($statement->rowCount()==1)      
            return true;
        else
        return false;

    }


    function InsertNuevoUsuario($nick,$password,$nombre,$fnac,$email)
    {
        $sql="INSERT INTO ".TABLA_USUARIO." (".USUARIO_COLUMN_NICK.", ".USUARIO_COLUMN_CONTRASENIA.", ".USUARIO_COLUMN_NOMBRE.", ".USUARIO_COLUMN_FNAC.", ".USUARIO_COLUMN_EMAIL.") VALUES ('".$nick."','".$password."','".$nombre."','".$fnac."','".$email."')";
        echo $sql;     
        $statement=$this->conecxion->query($sql);
        if($statement->rowCount()==1)      
            return true;
        else
        return false;
    }


}
?>