<?php
$bruto = 50000;//ámbito global

//definicion
function calcularNeto($bruto){
    return $bruto - $bruto * 0.17;//ámbito local
}

echo (calcularNeto($bruto));
?>