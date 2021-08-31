<?php
$aPacientes = array();
$aPacientes[] = array(
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.50,
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Juan Irraloa",
    "edad" => 28,
    "peso" => 65
);
$aPacientes[] = array(
    "dni" => "23.684.385",
    "nombre" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 45
);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica SA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <header>
        <?php include_once("header.php"); ?>
    </header>
    <main id="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-5">
                <table class="table table-hover border">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre y apellido</th>
                        <th>Edad</th>
                        <th>Peso</th>
                    </tr>

                    <?php
                    foreach ($aPacientes as $cliente) {
                        echo "<tr>";
                        echo "<td>" . $cliente["dni"] . "</td>";
                        echo "<td>" . $cliente["nombre"] . "</td>";
                        echo "<td>" . $cliente["edad"] . "</td>";
                        echo "<td>" . $cliente["peso"] . "</td>";
                        echo "</tr>";
                    }


                    ?>
                </table>
            </div>
        </div>
    </main>
    <footer>
        <?php include_once("footer.php") ?>
    </footer>
</body>

</html>