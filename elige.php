<!doctype html>
<html charset="UTF-8">
<head>
<meta charset="utf-8">
<title>Clientes Nuevos</title>
<?php include '../css/header.php'; ?>
</head>
<body>

</br>
<div class="container-fluid">


<h2 align="center">Tipo de Cliente</h2></br>

<nav style="margin-left:20%; margin-right:20%">

<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='clientes.php?cod=AS'">Directores</button>
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='clientes.php?cod=GT'">Locales</button>
<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='clientes.php?cod=E'">Empleados</button>
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='clientes.php?cod=%'">Otros</button>

</nav>

</div>


</body>
</html>