<?php

include_once "config.php";
include_once "entidades/venta.php";
include_once "entidades/cliente.php";
include_once "entidades/producto.php";

$venta = new Venta();
$venta->cargarFormulario($_REQUEST);

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $venta->actualizar();
        } else {
            $venta->insertar();
        }

        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";
    } else if (isset($_POST["btnBorrar"])) {
        $cliente->eliminar();
        header("Location: venta-listado.php");
    }
}

if(isset($_GET["do"]) && $_GET["do"] == "buscarProducto"){
    $aResultado = array();
    $idProducto = $_GET["id"];
    $producto = new Producto();
    $producto->idproducto = $idProducto;
    $producto->obtenerPorId();
    $aResultado["precio"] = $producto->precio;
    $aResultado["cantidad"] = $producto->cantidad;
    echo json_encode($aResultado);
    exit;
}

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();

$producto = new Producto();
$aProductos = $producto->obtenerTodos();


include_once "header.php";

?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Venta</h1>
    <?php if (isset($msg)) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                    <?php echo $msg["texto"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="venta-listado.php" class="btn btn-primary me-2">Listado</a>
            <a href="venta-formulario.php" class="btn btn-primary me-2">Nuevo</a>
            <button type="submit" class="btn btn-success me-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtFechaHora" class="d-block">Fecha y hora:</label>
            <select name="txtDia" id="txtDia" class="form-control d-inline" style="width: 80px;">
                <option selected="" disabled="">DD</option>
                <?php for ($i = 1; $i <= 31; $i++) : ?>
                    <option><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <select name="txtMes" id="txtMes" class="form-control d-inline" style="width: 80px;">
                <option selected="" disabled="">MM</option>
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                    <option><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <select name="txtAnio" id="txtAnio" class="form-control d-inline" style="width: 100px;">
                <option selected="" disabled="">YYYY</option>
                <?php for ($i = 1900; $i <= 2021; $i++) : ?>
                    <option><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <input type="time" class="form-control d-inline" style="width: 150px" name="txtHora" id="txtHora" value="00:00">
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="lstCliente">Cliente:</label>
            <select name="lstCliente" id="lstCliente" class="form-control">
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aClientes as $cliente) : ?>
                    <?php if ($cliente->idcliente == $venta->fk_idcliente) : ?>
                        <option selected value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-6 form-group">
            <label for="lstProducto">Producto:</label>
            <select name="lstProducto" id="lstProducto" class="form-control" onchange="fBuscarPrecio();">
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aProductos as $producto) : ?>
                    <?php if ($producto->idproducto == $venta->fk_idproducto) : ?>
                        <option selected value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtPrecioUni">Precio unitario:</label>
            <input type="text" class="form-control" id="txtPrecioUniCurrency" value="$ <?php echo $venta->preciounitario; ?>" disabled>
            <input type="hidden" class="form-control" name="txtPrecioUni" id="txtPrecioUni" value="<?php echo $venta->preciounitario; ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="text" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $venta->cantidad; ?>" onchange="fCalcularTotal();">
            <span id="msgStock" class="text-danger" style="display:none;">No hay stock suficiente</span>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtTotal">Total:</label>
            <input type="text" class="form-control" name="txtTotal" id="txtTotal" value="<?php echo $venta->total; ?>">
        </div>
    </div>
</div>

<script>
    function fBuscarPrecio() {
        let idProducto = $("#lstProducto option:selected").val();
        $.ajax({
            type: "GET",
            url: "venta-formulario.php?do=buscarProducto",
            data: { id: idProducto },
            async: true,
            dataType: "json",
            success: function(respuesta) {
                strResultado = Intl.NumberFormat("es-AR", {
                    style: 'currency',
                    currency: 'ARS'
                }).format(respuesta.precio);
                $("#txtPrecioUniCurrency").val(strResultado);
                $("#txtPrecioUni").val(respuesta.precio);
            }
        });
    }

    function fCalcularTotal() {
        var idProducto = $("#lstProducto option:selected").val();
        var precio = parseFloat($('#txtPrecioUni').val());
        var cantidad = parseInt($('#txtCantidad').val());

        $.ajax({
            type: "GET",
            url: "venta-formulario.php?do=buscarProducto",
            data: { id:idProducto },
            async: true,
            dataType: "json",
            success: function(respuesta){
                var resultado = 0;
                if(cantidad < respuesta.cantidad) {
                    resultado = precio * cantidad;
                    $("#msgStock").hide();
                } else {
                    $("#msgStock").show();
                }
                strResultado = Intl.NumberFormat("es-AR", {style: 'currency', currency: 'ARS'}).format(resultado);
                $("#txtTotal").val(strResultado);
            }
        });
    }
</script>

<?php include_once("footer.php"); ?>