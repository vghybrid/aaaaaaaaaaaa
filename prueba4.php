<?php

//definicion
function saludar($nombre,$apellido = ""){
    return "Hola $nombre $apellido"; //return "Hola ". $nombre . $apellido;
}

//uso
$saludo = saludar("Ana","Pérez");
echo $saludo . "<br>"; // Hola Ana Pérez
echo (saludar("Ricardo"));// Hola Ricardo

?>