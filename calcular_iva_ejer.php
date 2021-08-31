<?php

include_once("calcular_iva_res.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
    <main id="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-2 offset-3">
                <form action="" method="POST">
                    <div class="my-3">
                        <label for="">IVA
                            <select name="lstIVA" id="form-select">
                                <option value="21">21%</option>
                                <option value="10.5">10.5%</option>
                            </select>
                        </label>
                    </div>
                    <div class="my-3">
                        <Label>Precio sin IVA:
                            <input type="number" name="txtImporteSinIva" id="txtImporteSinIva" class="form-control">
                        </Label>
                    </div>
                    <div class="my-3">
                        <Label>Precio con IVA:
                            <input type="number" name="txtImporteConIva" id="txtImporteConIva" class="form-control">
                        </Label>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-dark">Calcular</button>
                    </div>
                </form>
            </div>
            <div class="col-4 my-5">
                <table class="table table-hover border shadow">
                    <tr>
                        <th>IVA:</th>
                        <th>$<?php echo $iva; ?></th>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <th>$<?php echo number_format($resPrecioSinIva, 2, ",", "."); ?></th>
                    </tr>
                    <tr>
                        <th>Precio con IVA:</th>
                        <th>$<?php echo number_format($resPrecioConIva, 2, ",", "."); ?></th>
                    </tr>
                    <tr>
                        <th>IVA cantidad:</th>
                        <th>$<?php echo number_format($resIvaCantidad, 2, ",", "."); ?></th>
                    </tr>
                </table>
            </div>
        </div>
    </main>

</body>

</html>