<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');


$hr = date("h");
$min = date("i");

for($a = 0; $a < 60; $a++){
    $min++;
    if($min == 60){
        $min = 0;
        $hr++;
    }
    if($hr == 24){
        $hr = 0;
    };

    echo "La hora es $hr:$min <br>";
}
?>