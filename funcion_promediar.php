<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aNotas = array(8, 4, 5, 3, 9, 1);

function promediar($aNumeros){
    $suma = 0;
    foreach ($aNumeros as $conteo){
        $suma += $conteo;
    }
    return $suma / count($aNumeros);
}

echo "La nota máxima es: " . promediar($aNotas);