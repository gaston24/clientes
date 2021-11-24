<!doctype html>
<html>
<head>

<title>Clientes</title>
<?php include '../css/header.php' ;
$codClient = $_GET['cod'];
?>
</head>
<body>
<form action="procesar.php" id="pedidos" style="margin:20px" method="GET">

ESTADO:
<select name="cliente">
<?php
$dsn = "LOCALES";
$user = "sa";
$pass = "Axoft";
$cid = odbc_connect($dsn, $user, $pass);
if(!$cid){echo "</br>Imposible conectarse a la base de datos!</br>";}
$sql="SELECT * FROM GVA14 WHERE COD_CLIENT LIKE '$codClient%' ORDER BY COD_CLIENT DESC";
$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
while($v=odbc_fetch_object($result)){

echo '<option value="'.$v->COD_CLIENT.'">'.$v->COD_CLIENT.' - '.$v->NOM_COM.'</option>';

}
?>
</select>

<br>
<div>
<?php
$dsn = "1 - CENTRAL";
$user = "sa";
$pass = "Axoft1988";
$cid = odbc_connect($dsn, $user, $pass);
if(!$cid){echo "</br>Imposible conectarse a la base de datos!</br>";}
$sql2="SELECT A.NRO_SUCURSAL, A.DESC_SUCURSAL, B.DSN FROM SUCURSAL A INNER JOIN SOF_USUARIOS B ON A.NRO_SUCURSAL = B.NRO_SUCURS
WHERE CA_423_HABILITADO = 1 AND NRO_SUCURSAL BETWEEN 2 AND 100 GROUP BY A.NRO_SUCURSAL, A.DESC_SUCURSAL, B.DSN ORDER BY 1";
$result2=odbc_exec($cid,$sql2)or die(exit("Error en odbc_exec"));
while($v=odbc_fetch_object($result2)){
echo '<input type="checkbox" name="dsn[]" value="'.$v->DSN.'">'.$v->NRO_SUCURSAL.' - '.$v->DESC_SUCURSAL.'<br>';
}

?>
</div>


<input type="submit" value="ENVIAR" class="btn btn-primary btn-sm"></br>
</form>

</br></br>
</body>
</html>


