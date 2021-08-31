<?php
$aAlumnos = array();
$aAlumnos[] = array(
    "nombre" => "Juan Peréz",
    "nota1" => 9,
    "nota2" => 8
);
$aAlumnos[] = array(
    "nombre" => "Gonzalo Roldán",
    "nota1" => 7,
    "nota2" => 6
);
$aAlumnos[] = array(
    "nombre" => "Aná Valle",
    "nota1" => 4,
    "nota2" => 9
);
$aAlumnos[] = array(
    "nombre" => "Anderson Sarmiento",
    "nota1" => 10,
    "nota2" => 10
);
$aAlumnos[] = array(
    "nombre" => "Sarah Rodriguez",
    "nota1" => 7,
    "nota2" => 5
);
$suma = 0;
$sumaPromedio = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Actas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-5">
                <table class="table table-hover border shadow">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alummo</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($aAlumnos as $estudiantes) {
                            $suma++;
                            $promedio = ($estudiantes["nota1"] + $estudiantes["nota2"]) / 2;
                            $sumaPromedio += $promedio;
                            echo "<tr>";
                            echo "<td>" . $suma . "</td>";
                            echo "<td>" . $estudiantes["nombre"] . "</td>";
                            echo "<td>" . $estudiantes["nota1"] . "</td>";
                            echo "<td>" . $estudiantes["nota2"] . "</td>";
                            echo "<td>" . number_format($promedio, 2, ",", ".") . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 ms-5">
                <p class="fw-bolder">Promedio de la cursada:
                    <?php echo number_format($sumaPromedio / $suma, 2, ",", ".");
                    ?>
                </p>
            </div>
        </div>
    </main>
</body>

</html>