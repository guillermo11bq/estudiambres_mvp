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
	<title>Estudihambres</title>
	<link rel="shortcut icon" href="src/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="src/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="src/style/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


</head>
<style>
html:before {
  content: "";
  position: fixed;
  left: 0;
  right: 0;
  z-index: -1;
  width: 100%;
  height: 100%;

  display: block;
  background: rgb(238,238,238);
background: linear-gradient(0deg, rgba(238,238,238,1) 0%, rgba(255,255,255,1) 100%);
}
</style>
<body>
    
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '326955518144513',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.2'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

	<nav class="navbar">
		<ul>
		   	<li><a href="index.php" class="home"><img class="logo" src="src/img/logo7.png"></a></li>
			<li <?= ($pagina == 'comprar') ? "class='active'" : '' ?>>
			    <a href="index.php" title="Comprar"><i class="fas fa-shopping-cart fa-lg"></i>
			    <span class="menu-header">Comprar</span></a>
			</li>
			<?php if (isset( $_SESSION["USER"] ) ): ?>
			<li <?= ($pagina == 'venderprincipal') ? "class='active'" : '' ?>>
			    <a href="?op=venderPrincipal" title="Vender"><i class="fas fa-dollar-sign fa-lg"></i>
			    <span class="menu-header">Vender</span></a>
			</li>
			<li class="rightli">
			    <a href="?salir" title="Cerrar sesión"><i class="fas fa-sign-out-alt fa-lg"></i>
			    <span class="menu-header">Salir</span></a>
			</li>
			<li id='username' class="rightli">
			    <a href="?op=editarusuario" title="Editar perfil"><i class="fas fa-user-edit fa-lg"></i>
			    <span class="menu-header"><?=$_SESSION['USER']['NOMBRE']?></span></a>
			    </li>
			<?php else: ?>
			<li class="rightli">
			    <a href="acceso.php" title="Ingresar al sistema"><i class="fas fa-user fa-lg"></i>
			    <span class="menu-header">Iniciar sesión</span></a>
			    </li>
		<?php endif; ?>
		</ul>
	</nav>
