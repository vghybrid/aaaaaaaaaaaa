<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "config.php";
include_once "entidades/tipoproducto.php";

$tipoProducto = new TipoProducto();
$atipoProducto = $tipoProducto->obtenerTodos();


include_once("header.php");
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Listado de tipo de productos</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="tipoproducto-formulario.php" class="btn btn-primary me-2">Nuevo</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover border">
            <tbody>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <?php
                foreach($atipoProducto as $tipo){
                    echo "<tr>";
                    echo "<td>" . $tipo->nombre . "</td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include_once("footer.php"); ?>