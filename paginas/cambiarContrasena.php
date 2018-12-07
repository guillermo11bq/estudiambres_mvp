<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<script type="text/javascript">
		function validar(){

		var pass1 = document.getElementById('correo1').value;
		var pass2 = document.getElementById('correo2').value;

		if (pass1 == pass2) {

		}else{
			alert("Las contraseñas no coinciden");
		}
		}


	</script>


<div align="center">
<form action="POST">
	
<h1>Cambiar Contraseña</h1>
<br>
Ingresa tu nueva contraseña
<br>
<input type="text" name="" id="correo1" name="correo1">
<br>
Repite la contraseña
<br>
<input type="text" name="" id="correo2" name="correo2">
<br>	
<br>	
<input type="submit" name="" value="Enviar" onclick="validar()">
</form>	
</div>
</body>
</html>