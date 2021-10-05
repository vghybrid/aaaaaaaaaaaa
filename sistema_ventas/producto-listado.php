<?php

include_once "config.php";
include_once "entidades/producto.php";

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

include_once "header.php";
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Listado de productos</h1>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="producto-formulario.php" class="btn btn-primary me-2">Nuevo</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover border">
            <tbody>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($aProductos as $producto) : ?>
                    <tr>
                        <td><img src="imagenes/<?php echo $producto->imagen; ?>" class="img-fluid"></td>
                        <td><?php echo $producto->nombre ?></td>
                        <td><?php echo $producto->cantidad ?></td>
                        <td><?php echo number_format($producto->precio, 2, ",", "."); ?></td>
                        <td>
                            <a href="producto-formulario.php?id=<?php echo $producto->idproducto; ?>"><i class="fas fa-search"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include_once("footer.php"); ?>