<?
require_once 'php-graph-sdk-5.4/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '326955518144513',
  'app_secret' => 'da9d7a100ef5f38a6dab23d384c0e7c1',
  'default_graph_version' => 'v2.10',
  ]);

session_start();
if(isset($_SESSION["USER"])){
	echo "<script>
            alert('YA ESTAS LOGUEADO');
            document.location.href = 'index.php';
            </script>";
} else {

$clienteSOAP = new SoapClient(null, [
        'uri' => 'http://localhost/',
        'location' => 'https://www.upmhworld.com/estudihambres/servicioWeb/wsclass.php']);
        
if ( !empty($_POST['usuario']) && !empty($_POST['password']) ) { 
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $logueo = $clienteSOAP -> acceso($usuario, $password);

    if ($logueo) {
        $_SESSION["USER"] = ["ID" => $logueo["ID"], "NOMBRE" => $logueo["NOMBRE"]];
        $nombre = $logueo['NOMBRE'];
        echo "<script>
            alert('Bienvenido al sistema $nombre');
            document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
            alert('Acceso denegado. Tus datos son incorrectos. $logueo');
            </script>";
    }

}

if ( !empty($_POST['pass']) && !empty($_POST['nombre']) && !empty($_POST['paterno']) && !empty($_POST['tel']) ) {
    $password = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $materno = isset($_POST['materno']) ? $_POST['materno'] : false;
    $paterno = $_POST['paterno'];
    $tel = $_POST['tel'];
    $alias = isset($_POST['alias']) ? $_POST['alias'] : false;

    $logueo = $clienteSOAP -> registrarUsuario($nombre, $paterno, $tel, $password, $materno, $alias);

    if ($logueo) {
        echo "<script>
            alert('Te has registrado con exito con el ID $logueo');
            </script>";
    } else {
        echo "<script>
            alert('Registro denegado. Tus datos son incorrectos. $logueo');
            </script>";
    }

}}
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="src/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="src/img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="src/style/estilos.css">
	<link rel="stylesheet" href="src/style/style.css">
	<title>Acceso</title>
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
  background: url("src/img/dona.jpg");
  -webkit-background-size: auto 100%;
  background-size: auto 100%;

  -webkit-filter: blur(2px);
  -moz-filter: blur(2px);
  -o-filter: blur(2px);
  -ms-filter: blur(2px);
  filter: blur(2px);

  background-position: top;
  background-repeat: no-repeat;
  background-size: cover;
}
	
	html {
		font-family: sans-serif;
	}

	body {
		margin: 0;
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
		font-size: 1rem;
		font-weight: 400;

		background: #fff;
		background-repeat: repeat-x;
		background-size: auto 100vh;
	}
</style>
</head>
<body>
    <div id="fb-root"></div>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '326955518144513',
      cookie     : true,
      //xfbml      : true,
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
	<div class="contenedor-form borderGray">
		<div class="toggle">
			<span> Crear Cuenta</span>
		</div>
				
		<div class="formulario">
			<img class='logoAcceso' src='src/img/logo-acceso.png' width='50%'>
			<form method="POST">
				<input type="text" name="usuario" placeholder="Telefono" required>
				<input type="password" name="password" placeholder="Contraseña" required>
				<input type="submit" value="Iniciar Sesión">
				
				<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false" ></div>
			</form>
		</div>
		
		<div class="formulario">
			<h2>Crea tu Cuenta</h2>
			<form method="POST">
				<!--<input type="text" name="usu" placeholder="Usuario" required>-->
				<input type="text" name="nombre" placeholder="Nombre" required>	
				<input type="text" name="paterno" placeholder="Apellido Paterno" required>
				<input type="text" name="materno" placeholder="Apellido Materno" required>
				<input type="text" name="alias" placeholder="Alias" required>	
				<input type="password" name="pass" placeholder="Contraseña" required>	
				<input type="number" min="1000000000" max="9999999999" name="tel" placeholder="Teléfono a 10 digitos" required>
						
				<input type="submit" value="Registrarse">
		