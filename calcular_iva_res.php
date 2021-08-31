<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$iva = 0;
$resPrecioSinIva = 0;
$resPrecioConIva = 0;
$resIvaCantidad = 0;


if ($_POST) {
    $iva = $_REQUEST["lstIVA"];
    $precioSinIva = $_REQUEST["txtImporteSinIva"];
    $precioConIva = $_REQUEST["txtImporteConIva"];

    if ($precioSinIva > 0 && $precioConIva == "") {
        $resPrecioConIva = $precioSinIva * ($iva / 100 + 1);
        $resPrecioSinIva = $precioSinIva;
        $resIvaCantidad = $resPrecioConIva - $resPrecioSinIva;
    }

    if ($precioConIva > 0 && $precioSinIva == "") {
        $resPrecioSinIva = $precioConIva / ($iva / 100 + 1);
        $resPrecioConIva = $precioConIva;
        $resIvaCantidad = $resPrecioConIva - $resPrecioSinIva;
    }
}

?>