<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php";

$producto = new Producto();
$producto->cargarFormulario($_REQUEST);

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        $nombreImagen = "";
        if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $nombreRandom = date("Ymdhmsi");
            $archivoTmp = $_FILES["imagen"]["tmp_name"];
            $nombreArchivo = $_FILES["imagen"]["name"];
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            $nombreImagen = "$nombreRandom.$extension";
            move_uploaded_file($archivoTmp, "imagenes/$nombreImagen");
        }

        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            $productoAnt = new Producto();
            $productoAnt->idproducto = $_GET["id"];
            $productoAnt->obtenerPorId();
            $imagenAnterior = $productoAnt->imagen;

            if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
                if (!$imagenAnterior != "") {
                    unlink($imagenAnterior);
                }
            } else {
                $nombreImagen = $imagenAnterior;
            }

            $producto->imagen = $nombreImagen;
            $producto->actualizar();
        } else {
            $producto->imagen = $nombreImagen;
            $producto->insertar();
        }
        
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        $producto->eliminar();
        header("Location: producto-listado.php");
    }
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $producto->obtenerPorId();
}

$tipoProducto = new TipoProducto();
$aTipoProductos = $tipoProducto->obtenerTodos();

include_once "header.php";
?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Productos</h1>
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
            <a href="producto-listado.php" class="btn btn-primary me-2">Listado</a>
            <a href="producto-formulario.php" class="btn btn-primary me-2">Nuevo</a>
            <button type="submit" class="btn btn-success me-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre; ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtNombre">Tipo de producto:</label>
            <select name="lstTipoProducto" id="lstTipoProducto" class="form-control selectpicker" data-live-search="true" required>
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aTipoProductos as $tipo) : ?>
                    <?php if ($tipo->idtipoproducto == $producto->fk_idtipoproducto) : ?>
                        <option selected value="<?php echo $tipo->idtipoproducto; ?>"><?php echo $tipo->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $tipo->idtipoproducto; ?>"><?php echo $tipo->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="number" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad; ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtPrecio">Precio:</label>
            <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $producto->precio; ?>">
        </div>
        <div class="col-12 form-group">
            <label for="txtCorreo">Descripción:</label>
            <textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion; ?></textarea>
        </div>
        <div class="col-6 form-group">
            <label for="fileImagen">Imagen:</label>
            <input type="file" class="form-control-file" name="imagen" id="imagen">
            <img src="files/<?php echo $producto->imagen; ?>" class="img-thumbnail">
        </div>
    </div>

</div>
<script>
    ClassicEditor
        .create(document.querySelector('#txtDescripcion'))
        .catch(error => {
            console.error(error);
        });
</script>
<?php include_once "footer.php"; ?>