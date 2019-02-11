<?php
//Clases en PHP, a partir de PHP5:
class Triangulo{

    //En php tambien hay ambito, excepto el ambito package que no existe en  php
    private $cateto1;
    private $cateto2;

    //constructor y destructores en php no se llama como la clase si no se llama la funcion (doble guion bajo) __construct() y __destruct()
    public function __construct($cateto1, $cateto2){
        //Para asignar la varible de los parametros a la variable de la clase en el constructor 
        //siempre tenemos que usar $this ->campo de la clase = parametro del constructor;
        $this->cateto1 = $cateto1;
        $this->getCateto2 =$cateto2;
    }

    //Los destructores nunca tienen parametros
    function __destruct()
    {
        echo"<p>Triangulo destruido.</p>";
    }

    function getHipotenusa(){
        //$this es por que cateto  forman parte de un objeto de la clase
        return sqrt(pow($this->$cateto1,2)+ pow($this->$cateto2,2));
    }

    //funciones similares a propiedades 
    function getCateto1(){
        return $this->$cateto1;
    }

    function getCateto2(){
        return $this->$cateto2;
    }

    /**Crear funcion que sea estatica que muestra el cuadrado de un argumento */
    static function getCuadrado($parametro){
        return pow($parametro);
    }

}
?>