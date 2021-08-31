<?php

//definicion
function sumar($num1,$num2){
    return $num1 + $num2;
}
function alcuadrado($num){
    return $num * $num;
}

//uso
$resultado = alcuadrado(sumar(2,8));
echo $resultado;

?>