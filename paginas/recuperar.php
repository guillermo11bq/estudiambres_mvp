<?php 
if (isset($_POST['correo'])) {
$correo = $_POST['correo'];
$asunto = "Recuperacion de contraseña";
$mensaje ="Ingresa a este link para poder cambiar tu contrasena";
mail($correo, $asunto, $mensaje);
//$url = "cambiarContrasena.php?email=.$correo";

}
 ?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	<title></title>
</head>
<body>


<div align="center">
<form method="post" action="recuperar.php">
	
<h1>Recuperar Contrasena</h1>
<br>
Ingresa tu correo para recuperar tu contrasena
<br>
<input type="text" name="" id="correo" name="correo" required="">
<br>	
<br>	
<input type="submit" name="" value="Enviar">
</form>	
</div>
</body>
</html>