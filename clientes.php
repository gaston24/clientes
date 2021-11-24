<?php
require_once __DIR__.'/Class/Cliente.php';
require_once __DIR__.'/Class/Local.php';

$codClient = $_GET['cod'];

$cliente = new Cliente();
$arrayClientes = $cliente->listarEmpleados($codClient);

$local = new Local();
$arrayLocales = $local->listarLocales();

?>
<!doctype html>
<html>
<head>

<title>Clientes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script defer src="js/main.js"></script>
</head>
<body>
<form action="Controlador/procesar.php" id="pedidos" style="margin:20px" method="POST">

ESTADO:
<select name="cliente">

<?php

foreach($arrayClientes as $v){
    ?>
    <option value="<?=$v[0]->COD_CLIENT?>"><?=$v[0]->COD_CLIENT?> - <?=$v[0]->NOM_COM?></option>
    <?php
}
?>
</select>

<br>
<div>



<?php

foreach($arrayLocales as $v){
    ?>
    <input type="checkbox" name="dsn[]" id="sucursales" region="<?=$v[0]->LOCALIDAD?>" value="<?=$v[0]->DSN?>"> <?=$v[0]->NRO_SUCURSAL?> - <?=$v[0]->DESC_SUCURSAL?><br>
    <?php
}

?>

</div>


<input type="submit" value="ENVIAR" class="btn btn-primary btn-sm"></br>
</form>
<div class="row">
    <div class="col">

    </div>
    <div class="col">
        <input type="checkbox" id="checkBsas" > Buenos Aires<br>
    </div>
    <div class="col">
        <input type="checkbox" id="checkRosario" > Rosario<br>
    </div>
    <div class="col">
        <input type="checkbox" id="checkMardel" > Mar del Plata<br>
    </div>
    <div class="col">
        <input type="checkbox" id="checkTodos" > Todos<br>
    </div>
    <div class="col">

    </div>
</div>
</br></br>
</body>
</html>


