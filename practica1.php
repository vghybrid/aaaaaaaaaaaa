<?php
$Tabla = $Tabla = array(
    "Mementos",
    "Avengers: Infinity Wars",
    "Soy Leyenda"
);
$nombre = "Anderson Sarmiento";
$edad = 23;
$fecha = date("d/m/Y");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Practica1</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover border">
                        <tr>
                            <th>Fecha</th>
                            <td><?php echo $fecha; ?></td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td><?php echo $nombre; ?></td>
                        </tr>
                        <tr>
                            <th>Edad</th>
                            <td><?php echo $edad; ?></td>
                        </tr>
                            <th>Peliculas favoritas</th>
                            <td><?php
                                for ($c = 0; $c < count($Tabla); $c++) {
                                    echo "<td>" . $Tabla[$c] . "</td>";
                                    echo "<br>";
                                }
                                ?></td>
                    </table>
                </div>
            </div>
        </div>

    </main>
</body>

</html>