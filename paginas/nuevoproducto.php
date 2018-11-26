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
    <h1 align="center">Agregar nuevos productos</h1>
    
    <div class=form>
        <form enctype="multipart/form-data" method="POST">
        <label>Nombre</label>
        <input type="text" placeholder="Asigna el nombre del producto" name="nombre">
        <br>
        <label>Descripcion</label>
        <input type="text" placeholder="Ej: Torta de milanesa rellena de..." name="descripcion">
        <br>
        <label>Precio</label>
        <input type="number" placeholder="Precio del producto" name="precio">
        <br>
        <label>Cantidad</label>
        <input type="number" placeholder="Cantidad" name="cantidad">
        <br>
        <label>Foto</label>
        <input type="file" accept="image/*;capture=camera" name="myimage" id="fileToUpload">
        <br>
        <input type="submit" name="submit" value="Registrar producto">
    </form>
    </div>
    
    

<?php

$db_name = "upmhworl_estudihambres";

$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$cantidad=$_POST['cantidad'];
$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp = addslashes(file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["myimage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
        // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
        // Check file size
    if ($_FILES["myimage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
        
        // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["myimage"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["myimage"]["name"]). "<script>alert('Lo lamento hubo un error al subir tu imagen')</script>";
            $idUsuario = $_SESSION["USER"]['ID'];
            
                    $result = mysqli_connect("localhost","upmhworl", "Fcheck2018") or die("Connection error: ". mysqli_error());
            
    				mysqli_select_db($result, $db_name) or die("Could not Connect to Database: ". mysqli_error($result));
    				
    				mysqli_query($result,"INSERT INTO Producto(nombre, descripcion, precio, idUsuario, activo, foto)
    				VALUES('$nombre','$descripcion',$precio,$idUsuario,1,'$imagename')") or die ("image not inserted". mysqli_error($result));
    				
    				mysqli_query($result,"INSERT INTO Movimiento(Cantidad, Momento, idProducto, IsDesechado)
    				VALUES($cantidad, now(), LAST_INSERT_ID(), 0)") or die ("movimiento no registrado". mysqli_error($result));
        } else {
            echo "<script>alert('Lo lamento hubo un error al subir tu imagen')</script>";
        }
    }
}
?>
</div>