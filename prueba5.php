<?php

//definicion
function saludar($nombre,$apellido = ""){
    return "Hola $nombre $apellido";
}

echo saludar("Juan"); //Hola Juan
echo "saludar";

?>