<?php
$aProductos = array();
$aProductos[] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000,
);
$aProductos[] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000,
);
$aProductos[] = array(
    "nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000,
);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejecicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <main id="container-">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Listado de productos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border shadow">
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>

                    <?php

                    for ($i = 0; $i < count($aProductos); $i++) {
                        echo "<tr>";
                        echo "<td>" . $aProductos[$i]["nombre"] . "</td>";
                        echo "<td>" . $aProductos[$i]["marca"] . "</td>";
                        echo "<td>" . $aProductos[$i]["modelo"] . "</td>";
                        echo "<td>" . ($aProductos[$i]["stock"] == 0 ? "No hay stock" : ($aProductos[$i]["stock"] > 10 ? "Hay stock" : "Poco stock")) . "</td>";
                        echo "<td> $" . $aProductos[$i]["precio"] . "</td>";
                        echo "<td><button class='btn btn-primary'>Comprar</button></td>";
                        echo "</tr>";
                    }
                    ?>
                    <th class="">
                    <?php
                    echo "El subtotal es: "
                    ?>
                    </th>


                </table>
            </div>
        </div>
    </main>
</body>

</html>