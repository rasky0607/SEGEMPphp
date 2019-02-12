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
define ("AULA_COLUMN_NOMBRE_AULA", "nombreCorto");
define ("AULA_COLUMN_DESCRIPCION", "nombreDescripcion");
define ("AULA_COLUMN_UBICACION", "ubicacion");
define ("AULA_COLUMN_TIC", "tic");//Pertenece o no el aula al tipo de aula de tecnologia o las TIC
define ("AULA_COLUMN_NORDENADORES", "nOrdenadores");


define ("TABLA_RESERVA", "reserva");
define ("RESERVA_COLUMN_NICK_USUARIO", "nickUsuario");
define ("RESERVA_COLUMN_NOMBRE_AULA", "nombreCortoAula");
define ("RESERVA_COLUMN_FECHA","fReserva");
define ("RESERVA_COLUMN_HORAINIRESER","horaIniresr");
define ("RESERVA_COLUMN_HORAFINRESER","horaFinreser");


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
        try{
        $sql="INSERT INTO ".TABLA_USUARIO." (".USUARIO_COLUMN_NICK.", ".USUARIO_COLUMN_CONTRASENIA.", ".USUARIO_COLUMN_NOMBRE.", ".USUARIO_COLUMN_FNAC.", ".USUARIO_COLUMN_EMAIL.") VALUES ('".$nick."','".$password."','".$nombre."','".$fnac."','".$email."')";
        //echo $sql;     
        $statement=$this->conecxion->prepare($sql);
        if($statement->execute())
        {     
            echo"Insertición exitosa";
        }

        }catch(PDOException $e)
        {
            echo"Inserción fallida ".$e;
        }
        
    }

    function SelectAulas()
    {
        try{
        $sql="SELECT ".AULA_COLUMN_NOMBRE_AULA.", ".AULA_COLUMN_DESCRIPCION.", ".AULA_COLUMN_UBICACION.", ".AULA_COLUMN_TIC.", ".AULA_COLUMN_NORDENADORES." FROM ".TABLA_AULA;
        //echo $sql;           
        $resultset = $this->conecxion->query($sql);
        return $resultset;       
        }
        catch(PDOException $e){
        $this->error=$e->getMessage();
        }

    }

    function SelectAulaNombre($nombreCorto)
    {
        try{
        $sql="SELECT ".AULA_COLUMN_NOMBRE_AULA.", ".AULA_COLUMN_DESCRIPCION.", ".AULA_COLUMN_UBICACION.", ".AULA_COLUMN_TIC.", ".AULA_COLUMN_NORDENADORES." FROM ".TABLA_AULA." WHERE ".AULA_COLUMN_NOMBRE_AULA."='".$nombreCorto."'";
        //echo $sql;           
        $resultset = $this->conecxion->query($sql);
        return $resultset;       
        }
        catch(PDOException $e){
        $this->error=$e->getMessage();
        }

    }

    function SelectReservas()
    {
        try{
            $sql="SELECT ".RESERVA_COLUMN_NICK_USUARIO.", ".RESERVA_COLUMN_NOMBRE_AULA.", ".RESERVA_COLUMN_FECHA.", ".RESERVA_COLUMN_HORAINIRESER.", ".RESERVA_COLUMN_HORAFINRESER." FROM ".TABLA_RESERVA;
            //echo $sql;           
            $resultset = $this->conecxion->query($sql);
            return $resultset;       
            }
            catch(PDOException $e){
            $this->error=$e->getMessage();
            }
    }



}
?>