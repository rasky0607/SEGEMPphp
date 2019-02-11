<?php

//Clase que va gestionar la conexion a la base dedatos

define("DATABASE","aula");
define("DSN","mysql:host=localhost;dbname=".DATABASE);
define("USER","usuario");
define("PASSWORD","123");
//Definimos las tablas con sus columnas
define("TABLE_USER","user");
define("COLUMN_USER_NAME","user");
define("COLUMN_USER_PASSWORD","password");

define ("TABLE_STUDENT", "alumno");
define ("TABLE_ABSENCE", "falta");
define ("COLUMN_ID_STUDENT", "id_alumno");
define ("COLUMN_DATE","date");
define ("COLUMN_ID_MODULO","id_modulo");


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
    function isConnected()
    {
        return isset($this->conecxion);
    }

    //Funcion que compruebasi existe el usuario en la tabla User
    function validateUser($user,$password){
        $sql="SELECT * FROM ".TABLE_USER." WHERE ".COLUMN_USER_NAME."='".$user."' AND ".COLUMN_USER_PASSWORD." =sha1('".$password."')";
        //echo $sql;  
        $statement=$this->conecxion->query($sql);
        if($statement->rowCount()==1)      
            return true;
        else
        return false;

    }

    function getStudents(){
        try
        {
            $sql="SELECT * FROM ".TABLE_STUDENT;
            $resultset=$this->conecxion->query($sql);
            //echo $sql; 
            
            return $resultset;
        }
        catch (PDOException $e)
        {
            $this->$error=$e->getMessage();
        }
    }

    function getAbsences(){
        try{
            $sql = "SELECT * FROM ".TABLE_ABSENCE;
            //echo $sql;
            $resultset = $this->conecxion->query($sql);
            return $resultset;
        }catch(PDOException $e){
            $this->error=$e->getMessage();
        }
    }

    function getAbsencesFrom($idStudent){
        try{
            $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_ID_STUDENT. " = ".$idStudent;
            //echo $sql;
            $resultset = $this->conecxion->query($sql);
            return $resultset;
        }catch(PDOException $e){
            $this->error=$e->getMessage();
        }
    }

//Recibe todos los datos
//Devuelve las faltas de un determinado alumno en un rango de fechas en  un determinado modulo
//select  * from (select * from falta where date>="2019-02-15" and date<="2019-02-20")as d where id_alumno=1 and id_modulo=1;
    function getAbsencesFromDateRanged($idStudent,$fechadesde,$fechahasta,$modulo){      
        try{
            $sql = "SELECT * FROM (SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE.">='".$fechadesde."' AND ".COLUMN_DATE."<='".$fechahasta."')AS d WHERE ".COLUMN_ID_STUDENT."=".$idStudent." AND ".COLUMN_ID_MODULO."=".$modulo;
            //echo $sql;
            $resultset = $this->conecxion->query($sql);
            return $resultset;
        }catch(PDOException $e){
            $this->error=$e->getMessage();
        }
    }


//PRUEBA ------
//Todo menos modulo
// SELECT * FROM (SELECT * FROM falta WHERE date>='2019-02-15' AND date<='2019-02-22')AS d WHERE id_alumno=1;
function getAbsencesFromDateRangedNoModulo($idStudent,$fechadesde,$fechahasta){      
    try{
        $sql = "SELECT * FROM (SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE.">='".$fechadesde."' AND ".COLUMN_DATE."<='".$fechahasta."')AS d WHERE ".COLUMN_ID_STUDENT."=".$idStudent;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}
//Todo menos fecha hasta
// select  * from falta where date>="20190215" and id_alumno=1 and id_modulo=1;
function getAbsencesFromDateRangedNoFechaHasta($idStudent,$fechadesde,$modulo){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE.">='".$fechadesde."' AND ".COLUMN_ID_STUDENT."=".$idStudent." AND ".COLUMN_ID_MODULO."=".$modulo;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}
//Todo menos fecha desde
//select  * from falta where date<="20190215" and id_alumno=1 and id_modulo=1;
function getAbsencesFromDateRangedNoFechaDesde($idStudent,$fechahasta,$modulo){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE."<='".$fechahasta."' AND ".COLUMN_ID_STUDENT."=".$idStudent." AND ".COLUMN_ID_MODULO."=".$modulo;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}

//Todo menos ID
//select  * from falta where date>="20190215" and date<="20190221" and id_modulo=1;
function getAbsencesFromDateRangedNoId($fechadesde,$fechahasta,$modulo){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE.">='".$fechadesde."' AND ".COLUMN_DATE."<='".$fechahasta."' AND ".COLUMN_ID_MODULO."=".$modulo;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}
//Solo Fecha hasta
function getAbsencesFromDateRangedOnlyFechaHasta($fechahasta){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE."<='".$fechahasta."'";
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}
//Solo Fecha hasta e ID
function getAbsencesFromDateRangedFechaHastaId($idStudent,$fechahasta){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE."<='".$fechahasta."' AND ".COLUMN_ID_STUDENT."=".$idStudent;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}

//Solo Fecha hasta, Modulo
function getAbsencesFromDateRangedFechaHastaModulo($fechahasta,$modulo){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE."<='".$fechahasta."' AND ".COLUMN_ID_MODULO."=".$modulo;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}
//Solo Fecha desde
function getAbsencesFromDateRangedOnlyFechaDesde($fechadesde){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE.">='".$fechadesde."'";
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}
//Solo Fecha desde y Modulo
function getAbsencesFromDateRangedFechaDesdeModulo($fechadesde,$modulo){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE.">='".$fechadesde."' AND ".COLUMN_ID_MODULO."=".$modulo;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}
//Solo damos Fecha desde y Fecha hasta
//select  * from falta where  date>="20190215" and date<="20190221";
function getAbsencesFromDateRangedFechaDesdeHasta($fechadesde,$fechahasta){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE.">='".$fechadesde."' AND ".COLUMN_DATE."<='".$fechahasta."'";
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}

//Solo ID y Fecha desde
function getAbsencesFromDateRangedIdFechaDesde($idStudent,$fechadesde){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_DATE.">='".$fechadesde."' AND ".COLUMN_ID_STUDENT."=".$idStudent;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}


//Solo ID
//SELECT * FROM falta WHERE id_alumno=1;
//Realizado mas arriva en getAbsencesFrom($idStudent)

//SOlo ID  y Modulo
function getAbsencesFromIdModulo($idStudent,$modulo){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_ID_STUDENT."=".$idStudent." AND ".COLUMN_ID_MODULO."=".$modulo;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}

//Solo ID  y Fecha hasta
function getAbsencesFromIdFechaHasta($idStudent,$fechahasta){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_ID_STUDENT."=".$idStudent." AND ".COLUMN_DATE."<='".$fechahasta."'";
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}

//Solo ID  y Fecha Desde
function getAbsencesFromIdFechaDesde($idStudent,$fechadesde){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_ID_STUDENT."=".$idStudent." AND ".COLUMN_DATE.">='".$fechadesde."'";
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}

//Solo Modulo 
function getAbsencesFromModulo($modulo){      
    try{
        $sql = "SELECT * FROM ".TABLE_ABSENCE." WHERE ".COLUMN_ID_MODULO."=".$modulo;
        //echo $sql;
        $resultset = $this->conecxion->query($sql);
        return $resultset;
    }catch(PDOException $e){
        $this->error=$e->getMessage();
    }
}

//---

}
?>