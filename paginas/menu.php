<?php 
session_start();
if ( isset($_GET['salir']) ) {
	session_destroy();
	$_SESSION = [];
	header('Location: index.php', true, 303);
	close();
}
?><!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
	<link rel="stylesheet" href="src/style/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset='UTF-8'>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


</head>
<body>
	<nav class="navbar">
		<ul>
		   	<li><img class="logo" src="src/img/logo7.png"></li>
			<li <?= ($pagina == 'comprar') ? "class='active'" : '' ?>><a href="index.php">Comprar</a></li>
			<?php if (isset( $_SESSION["USER"] ) ): ?>
			<li <?= ($pagina == 'venderprincipal') ? "class='active'" : '' ?>><a href="?op=venderPrincipal">Vender</a></li>
			<li class="rightli"><a href="?salir">Salir</a></li>
			<li id='username' class="rightli"><a><?=$_SESSION['USER']['NOMBRE']?></a></li>
			<?php else: ?>
			<!--<li class="rightli"><a>Registrarse</a></li>-->
			<li class="rightli"><a href="acceso.php">Iniciar sesión</a></li>
		<?php endif; ?>
		</ul>
	</nav>
