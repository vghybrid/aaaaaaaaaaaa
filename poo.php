<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{

    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function imprimir(){
        echo "DNI = $this->dni<br>";
        echo "Nombre = $this->nombre<br>";
        echo "Edad = $this->edad<br>";
        echo "Nacionalidad = $this->nacionalidad<br>";
        echo "<br>";
    }
}

class Alumno extends Persona{

    public $legajo;

    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0;
        $this->notaProyecto = 0.0;
    }
    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Legajo: " . $this->legajo . "<br>";
        echo "Nota porfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota PHP: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "Promedio: " . $this->calcularPromedio() . "<br>";
        echo "<br>";
    }
    public function calcularPromedio(){
        return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }
}
class Docente extends Persona{
    public $especialidad;

    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Especialidad " . $this->especialidad . "<br>";
        echo "<br>";
    }
    
    public function imprimirEspecialidadesHabilidades(){

    }
}

//programa
$persona1 = new Persona();
$persona1->dni = "35678321";
$persona1->nombre = "Juan Perez";
$persona1->edad = 30;
$persona1->nacionalidad = "Argentina";
$persona1->imprimir();

$alumno1 = new Alumno();
$alumno1->nombre = "Julia Lopez";
$alumno1->dni = "38979977";
$alumno1->nacionalidad = "Argentina";
$alumno1->legajo = 7898;
$alumno1->notaPhp = 8.5;
$alumno1->notaPortfolio = 7.5;
$alumno1->notaProyecto = 8;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->nombre = "Matías Diaz";
$alumno2->nacionalidad = "Colombiano";
$alumno2->notaPortfolio = 9;
$alumno2->notaPhp = 9;
$alumno2->notaProyecto = 8;
$alumno2->imprimir();

$docente1 = new Docente();
$docente1->nombre = "Juan Carlos Rosales";
$docente1->imprimir();

?>