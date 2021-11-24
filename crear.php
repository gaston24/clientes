<!doctype html>
<html>
<head>

<title>Clientes</title>
<?php include '../css/header.php' ;
$codClient = $_GET['cod'];?>
</head>
<body>
<form action="procesar_crear.php" id="pedidos" style="margin:20px" method="GET">

<?php
if($codClient == 'AS'){

	$dsn = "LOCALES";
	$user = "sa";
	$pass = "Axoft";
	$cid = odbc_connect($dsn, $user, $pass);
	if(!$cid){echo "</br>Imposible conectarse a la base de datos!</br>";}
	$sql="SELECT RIGHT(('0'+CAST(RIGHT(MAX(COD_CLIENT),4)+1 AS VARCHAR)), 4)ID  FROM GVA14 WHERE COD_CLIENT LIKE '$codClient%'";
	$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	while($v=odbc_fetch_object($result)){

	$next = 'AS'.$v->ID;

	}
}elseif($codClient == '%'){
	$next = '';
}else{
	$next = $codClient;
}
?>


Codigo: <input type="text" name="codClient" value="<?php echo $next; ?>">
Nombre: <input type="text" name="nombre">
DNI:<input type="text" name="dni">
<?php
if($codClient == 'AS'){
	echo 'Porc Desc: <input type="text" name="porcDesc"> DNI: <input type="text" name="dni">';
}elseif($codClient == 'GT'){
	echo 'Nro Sucurs: <input type="text" name="nroSucurs">';
}elseif($codClient == 'E'){
	echo 'Porc Desc: <input type="text" name="porcDesc" value="35" readonly>';
}elseif($codClient == '%'){
	echo 'Porc Desc: <input type="text" name="porcDesc"> DNI: <input type="text" name="dni">';
}	
?>


<input type="submit" name="Crear">
</body>
</html>