<?php if (!isset($_SESSION["USER"])):?>
<?php else: 



        
            $idUsuario = $_SESSION["USER"]['ID'];
        $clienteSOAP = new SoapClient(null, ['uri' => 'http://localhost/',
        'location' => 'https://www.upmhworld.com/estudihambres/servicioWeb/wsclass.php']);
        if(isset( $_POST['submit'] )) {
            $name = $_POST['nombre'];
            $lastpaterno = $_POST['ap'];
            $lastmaterno = $_POST['am'];
            $alias = $_POST['alias'];
            $phone = $_POST['cel'];
                        $verunproducto = $clienteSOAP -> editarUsuario($idUsuario, $name, $lastpaterno, $lastmaterno, $alias, $phone);

        }
            $user = $clienteSOAP -> verUser($idUsuario);


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="src/style/estilos.css">
	<link rel="stylesheet" href="src/style/style.css">
	<title>Acceso</title>
	<style>
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

<div class="contenedor-form borderGray">
    <h1 align="center" style="margin-top: 40px">Editar Usuario</h1>
    
    <div class=formulario>

        <form method="POST">
        <label>Nombre</label>
        <input type="text" value="<?=$user['Nombre']?>" name="nombre">
        <br>
        <label>Apellido Paterno</label>
        <input type="text" value="<?=$user['ApellidoP']?>"  name="ap">
        <br>
        <label>Apellido Materno</label>
        <input type="text" name="am" value="<?=$user['ApellidoM']?>">
        <br>
        <label>Alias</label>
        <input type="text" value="<?=$user['Alias']?>" name="alias" >
        <br>
        <label>Telefono</label>
        <input type="number" value="<?=$user['Celular']?>" name="cel">
        <br>
        <input type="submit" name="submit" value="Editar mi perfil">
    </form>
    </div>
    
    

</div>

<?php endif; ?>

