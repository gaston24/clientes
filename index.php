<!doctype html>
<head>
<title>Clientes Nuevos</title>
<?php include '../css/header.php'; ?>
</head>
<body onload="nobackbutton();">

</br>
<div class="container-fluid">


<h2 align="center">Que desea hacer?</h2></br>

<nav style="margin-left:20%; margin-right:20%">

<button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='elige_crear.php'">Crear Cliente</button>
<button type="button" class="btn btn-secondary btn-lg btn-block" onclick="location.href='elige.php'">Enviar Cliente</button>


</nav>

</div>


</body>
<script>
function nobackbutton(){
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button" //chrome
window.onhashchange=function(){window.location.hash="no-back-button";}
}
</script>
</html>

