<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$aEmpleados = array();
$aEmpleados[] =  array(
    "dni" => 33300123,
    "nombre" => "David García",
    "bruto" => 85000.30
);
$aEmpleados[] =  array(
    "dni" => 40874456,
    "nombre" => "Ana Del Valle",
    "bruto" => 90000
);
$aEmpleados[] =  array(
    "dni" => 67567565,
    "nombre" => "Andrés Perez",
    "bruto" => 100000
);
$aEmpleados[] =  array(
    "dni" => 75744545,
    "nombre" => "Victoria Luz",
    "bruto" => 70000
);
$aEmpleados[] =  array(
    "dni" => 90123456,
    "nombre" => "Sarah Rodriguez",
    "bruto" => 125000
);
$aEmpleados[] =  array(
    "dni" => 26159100,
    "nombre" => "María Barrios",
    "bruto" => 65000
);
$aEmpleados[] =  array(
    "dni" => 85152358,
    "nombre" => "Miguel Lopez",
    "bruto" => 35625.60
);
include_once("neto.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <main id="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Lista de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-5">
                <table class="table table-hover border shadow">
                    <tr>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre y apellido</th>
                        <th>Sueldo</th>
                    </tr>

                    <?php
                    foreach ($aEmpleados as $cliente) {
                        echo "<tr>";
                        echo "<td>" . $cliente["dni"] . "</td>";
                        echo "<td>" . mb_strtoupper($cliente["nombre"]) . "</td>";
                        echo "<td>" . number_format(calcularNeto($cliente["bruto"]), 2, ",", ".") . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tr>
                </table>
            </div>
        </div>
        <div>
            <div class="col-12 ps-5">
                <p><strong>Cantidad de empleados activos:
                        <?php
                        echo count($aEmpleados);
                        ?>
                    </strong></p>
            </div>
        </div>
    </main>
</body>

</html>