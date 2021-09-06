<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);

if (file_exists("archivo.txt")) {
    //Leer el archivo y almacenar su contenido json en  $jSonClientes
    $jsonClientes = file_get_contents("archivo.txt");

    //Convertir el json en array $aClientes
    $aClientes = json_decode($jsonClientes, true);
} else {
    $aClientes = array();
}

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

if ($_POST) {
    $dni = trim($_REQUEST["txtDocumento"]);
    $nombre = trim($_REQUEST["txtNombre"]);
    $telefono = trim($_REQUEST["txtTelefono"]);
    $correo = trim($_REQUEST["txtCorreo"]);
    $imagen = "";

    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi"); //2021010420453710
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $nombreArchivo = $_FILES["archivo"]["name"];
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $imagen = "$nombreAleatorio.$extension";
        move_uploaded_file($archivo_tmp, "imagenes/$imagen");
    }

    if ($id != "") {
        //Actualizar cliente
        if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $imagen = $aClientes[$id]["imagen"];
        } else {
            //Si está subiendo una nueva imagen, debe eliminar la imagen anterior
            unlink("imagenes/" . $aClientes[$id]["imagen"]);
        }

        $aClientes[$id] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen
        );
    } else {
        //Insertar nuevo cliente
        $aClientes[] = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "correo" => $correo,
            "imagen" => $imagen
        );
    }
    //Convertir el array a json y almacenarlo en una variable $jSonClientes
    $jsonClientes = json_encode($aClientes);

    //Almacenar el contenido de la variable json en el archivo.txt
    file_put_contents("archivo.txt", $jsonClientes);
    header("Location: index.php");
}

if ($id != "" && isset($_REQUEST["do"]) && $_REQUEST["do"] == "eliminar") {
    unset($aClientes[$id]);
    $jsonClientes = json_encode($aClientes);
    file_put_contents("archivo.txt", $jsonClientes);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <?php if (isset($msg) && $msg != "") : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $msg; ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-12">
                            <label>DNI:*
                                <input type="text" name="txtDocumento" id="txtDocumento" class="form-control" require value="<?php echo isset($aClientes[$id]["dni"]) ? $aClientes[$id]["dni"] : ""; ?>">
                            </label>
                        </div>
                        <div class="col-12">
                            <label>Nombre:*
                                <input type="text" name="txtNombre" id="txtNombre" class="form-control" require value="<?php echo isset($aClientes[$id]["nombre"]) ? $aClientes[$id]["nombre"] : ""; ?>">
                            </label>
                        </div>
                        <div class="col-12">
                            <label>Telefóno:*
                                <input type="txt" name="txtTelefono" id="txtTelefono" class="form-control" require value="<?php echo isset($aClientes[$id]["telefono"]) ? $aClientes[$id]["telefono"] : ""; ?>">
                            </label>
                        </div>
                        <div class="col-12">
                            <label>Correo:*
                                <input type="mail" name="txtCorreo" id="txtCorreo" class="form-control" require value="<?php echo isset($aClientes[$id]["correo"]) ? $aClientes[$id]["correo"] : ""; ?>">
                            </label>
                        </div>
                        <div class="col-12">
                            <label for="archivos">Archivo adjunto:</label>
                            <input type="file" name="archivos" id="archivos" accept=".jpg, .jpeg, .png">
                            <label for="">Archivos admitidos: .jpg, .jpeg, .png</label>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover border shadow">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <?php foreach ($aClientes as $pos => $clientes) : ?>
                        <tr>
                            <td><img src="imagenes/<?php echo $clientes["imagen"]; ?>" class="img-thumbnail"></td>
                            <td><?php echo $clientes["dni"]; ?></td>
                            <td><?php echo $clientes["nombre"]; ?></td>
                            <td><?php echo $clientes["correo"]; ?></td>
                            <td style="width: 110px;">
                                <a href="<?php echo "?id=$pos"; ?>"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo "?id=$pos&do=eliminar"; ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <a href="index.php"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </main>
</body>

</html>