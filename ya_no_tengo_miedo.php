<?php
$importe = 1050.95;
echo "$ " . number_format($importe,2,",",".") . "<br>";
?>

<?php
$fecha = "2021-08-17";
echo date_format(date_create($fecha), 'd/m/Y') . "<br>";
?>
