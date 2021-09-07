<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona
{

    protected $dni;
    protected $nombre;
    protected $correo;
    protected $telefono;

    public function __construct($dni, $nombre, $correo, $telefono)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
}

class Alumno extends Persona
{

    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;

    public function __construct($dni, $nombre, $correo, $telefono, $fechaNac)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->fechaNac = $fechaNac;
        $this->peso = 0.0;
        $this->altura = 0.0;
        $this->presentismo = 0.0;
        $this->aptoFisico = false;
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function SetFichaMedica($peso, $altura, $aptoFisico)
    {
        $this->peso = $peso;
        $this->altura = $altura;
        $this->aptoFisico = $aptoFisico;
    }
}

class Entrenador extends Persona
{

    private $aClases;

    public function __construct($dni, $nombre, $correo, $telefono)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->aClases = array();
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
}


class Clase
{

    private $nombre;
    private $entrenador;
    private $aAlumno;

    public function __construct()
    {
        $this->aAlumno = array();
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function inscribirAlumno($alumno)
    {
        $this->aAlumno[] = $alumno;
    }

    public function AsignarEntrenador($entrenador)
    {
        $this->entrenador = $entrenador;
    }

    public function imprimirListado()
    {
        echo "<table class='table-hover border shadow'>";
        echo "<tr>";
        echo "<th>" . "Clase: " . "</th>";
        echo "<td>" . $this->nombre . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . "Entrenador:" . $this->entrenador->nombre . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . "DNI:" . $this->entrenador->dni . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . "Correo:" . $this->entrenador->correo . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . "Teléfono:" . $this->entrenador->telefono . "</td>";
        echo "</tr>";
        foreach ($this->aAlumno as $alumno) {
            echo "<tr>";
            echo "<td>" . "DNI:" $alumno->dni . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . "Nombre:" . "</td>";
            echo "</tr>";
        }
    }
}

//Desarrollo del programa
$entrenador1 = new Entrenador("34987789", "Miguel Ocampo", "miguel@mail.com", "11678634");
$entrenador2 = new Entrenador("28987589", "Andrea Zarate", "andrea@mail.com", "11768654");

$alumno1 = new Alumno("40787657", "Dante Montera", "dante@mail.com", "1145632457", "1997-08-28");
$alumno1->setFichaMedica(90, 178, true);
$alumno1->presentismo = 78;

$alumno2 = new Alumno("46766547", "Darío Turchi", "dante@mail.com", "1145632457", "1986-11-21");
$alumno2->setFichaMedica(73, 168, false);
$alumno2->presentismo = 68;

$alumno3 = new Alumno("39765454", "Facundo Fagnano", "facundo@mail.com", "1145632457", "1993-02-06");
$alumno3->setFichaMedica(90, 187, true);
$alumno3->presentismo = 88;

$alumno4 = new Alumno("41687536", "Gastón Aguilar", "gaston@mail.com", "1145632457", "1999-11-02");
$alumno4->setFichaMedica(70, 169, false);
$alumno4->presentismo = 98;

$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);


$clase2 = new Clase();
$clase2->nombre = "Zumba";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno2);
$clase2->inscribirAlumno($alumno3);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-6 p-5">
                <?php $clase1->imprimirListado(); ?>
            </div>
            <div class="col-6 p-5">
                <?php $clase2->imprimirListado(); ?>
            </div>
    </main>
</body>

</html>