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
<?php include '../css/header.php' ;

?>
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
    <input type="checkbox" name="dsn[]" value="<?=$v[0]->DSN?>"><?=$v[0]->NRO_SUCURSAL?> - <?=$v[0]->DESC_SUCURSAL?><br>
    <?php
}

?>
</div>


<input type="submit" value="ENVIAR" class="btn btn-primary btn-sm"></br>
</form>

</br></br>
</body>
</html>


