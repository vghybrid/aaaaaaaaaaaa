<?php
if ($_POST) {

    $usuario = $_REQUEST["txtUsuario"];
    $clave = $_REQUEST["passClave"];


    if ($usuario != "" && $clave != "") {
        header("Location: acceso-confirmado.php");
    } else {
        $alerta = "Solo valido para usuarios registrados";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <main id="container">
        <div class="row">
            <div class="col-12 mt-5 ms-5 text">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 ms-5 mt-2">
                <?php 
                if(isset($alerta) && $alerta != "") :?>
                    <div class="alert alert-danger" role="alert"><?php echo $alerta?></div>
                    <?php endif ?>
                <form action="" method="POST">
                    <div class="my-2">
                        <label>Usuario: <input type="text" name="txtUsuario" id="txtUsuario" class="form-control"></label>
                    </div>
                    <div class="my-2">
                        <label>Clave: <input type="password" name="passClave" id="passClave" class="form-control"></label>
                    </div>
                    <div class="my-2">
                        <button type="submit" class="btn btn-success mt-3">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>