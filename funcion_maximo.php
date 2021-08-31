<?php


function promedio($aVector){
    $suma = 0;
    foreach($aVector as $notas){
        
        if($notas > $suma){
            $suma = $notas;
        }
        return $suma;
    }   
}

$aNotas = array(8, 4, 5, 3, 9, 1);
$aSueldo= array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);


echo "El sueldo máximo es: $" . promedio($aSueldo) . "<br>";
echo "La nota máxima es: " . promedio($aNotas);

?>