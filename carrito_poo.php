<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente{

    private $dni;
    private $nombre;
    private $telefono;
    private $correo;
    private $descuento;

    public function __construct() {
        $this->descuento = 0.0;
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir() {
        echo "DNI = $this->dni<br>";
        echo "Nombre = $this->nombre<br>";
        echo "Telefono = $this->telefono<br>";
        echo "Correo = $this->correo<br>";
        echo "Descuento = $this->descuento<br>";
        echo "<br>";
    }
}

class Producto {

    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __construct() {
        $this->precio = 0.0;
        $this->iva = 0.0;
    }


    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function imprimir() {
        echo "COD = $this->cod<br>";
        echo "Nombre = $this->nombre<br>";
        echo "Precio = $this->precio<br>";
        echo "Descripcion = $this->descripcion<br>";
        echo "IVA = $this->iva<br>";
        echo "<br>";
    }
}

class Carrito{

    private $cliente;
    private $aProductos;
    private $subTotal;
    private $total;

    public function __construct() {
        $this->subtotal = 0.0;
        $this->total = 0.0;
        $this->aProductos = array();
    }
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function cargarProducto($producto){
        $this->aProductos[] = $producto;
    }

    public function imprimirTicket(){
        echo "<table class='table-hover border shadow' style='width:400px'>";
        echo "<tr>" . "<th colspan='2' class='text-center'>" . "Supermercado" . "</th>". "</tr>";
        echo "<tr>";
        echo "<th>" . "Fecha" . "</th>";
        echo "<td>" . date("d/m/Y") . "</td>";
        echo "</tr";
        echo "<tr>";
        echo "<th>" . "DNI" . "</th>";
        echo "<td>" . $this->cliente->dni . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>" . "Nombre" . "</th>";
        echo "<td>" . $this->cliente->nombre . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th colspan='2'>" . "Productos:" . "</th>";
        echo "</tr>";
        foreach($this->aProductos as $producto) {
            echo "<tr>";
            echo "<td>" . $producto->nombre . "</td>";
            echo "<td>" . "$" . number_format($producto->precio, 2, ",", ".") . "</td>";
            echo "</tr>";
            $this->subTotal += $producto->precio;
            $this->total += $producto->precio * (($producto->iva / 100) +1);
        }
        echo "<tr>";
        echo "<th>". "Subtotal: " . "</th>";
        echo "<td>" . "$" . number_format($this->subTotal, 2, ",", ".") . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>". "Total: " . "</th>";
        echo "<td>" . "$" . number_format($this->total, 2, ",", ".") . "</td>";
        echo "</tr>";
        echo "</table>";
    }
}

//Definicion de clases
$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.05;
//$cliente1->imprimir();


$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 21;
//$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirlpool";
$producto2->descripcion = "Esta es una heladera no froze";
$producto2->precio = 76000;
$producto2->iva = 10.5;
//$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);
//$carrito->imprimir();
//Imprime el ticket de la compra
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <?php $carrito->imprimirTicket(); ?>
            </div>
        </div>
    </main>

</body>

</html>