<?php

if(isset($_POST["submit"])) {
    $db_name = "upmhworl_estudihambres";

    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripcion'];
    $cantidad=$_POST['cantidad'];

    $currentDir = getcwd();
    $uploadDirectory = "/images/";
    $errors = []; // Store all foreseen and unforseen errors here
    $fileExtensions = ['jpeg','jpg','png','gif']; // Get all the file extensions
    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
    //echo $uploadPath;
        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "Este tipo de archivo no lo soprtamos. Solo JPG, JPEG, PNG y GIF";
        }
      
        if ($fileSize > 50000000) {
            $errors[] = "Este archivo supera los 20MB. Prueba con uno mas ligero";
        }
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if ($didUpload) {
                //echo "El archivo " . basename($fileName) . " se ha subido";
                $idUsuario = $_SESSION["USER"]['ID'];
            
                $result = mysqli_connect("localhost","upmhworl", "Fcheck2019") or die("Connection error: ". mysqli_error());
            
    		    mysqli_select_db($result, $db_name) or die("Could not Connect to Database: ". mysqli_error($result));
    				
			    mysqli_query($result,"INSERT INTO Producto(nombre, descripcion, precio, idUsuario, activo, foto)
    		    	VALUES('$nombre','$descripcion',$precio,$idUsuario,1,'$fileName')") or die ("no se pudo insertar la imagen". mysqli_error($result));
    				
    		    mysqli_query($result,"INSERT INTO Movimiento(Cantidad, Momento, idProducto, IsDesechado)
				    VALUES($cantidad, now(), LAST_INSERT_ID(), 0)") or die ("movimiento no registrado". mysqli_error($result));
				    
				header('Location: index.php?op=venderPrincipal', true, 303);
                die();
            } else {
                echo "<script>alert('Ocurrio un error. Lo sentimos.');</script>";
            }
        } else {
            echo "<script>alert('Hubo errores\\n";
            foreach ($errors as $error) {
                echo $error . "\\n";
            }
            echo "');</script>";
        }
}
?>
<link rel="stylesheet" property="stylesheet" href="src/style/estilos.css">
	
<div class="contenedor-form borderGray">
    <h1 align="center" style="margin-top: 40px">Agregar nuevos productos</h1>
    <!--<h2 align="center">Disculpa, estamos haciendo reparaciones, intenta de nuevo en 30 minutos</h2>-->
    Ya funciona!!
    <div class="formulario">
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
        <input type="file" accept="image/*;capture=camera" name="myfile" id="myfile">
        <br>
        <input type="submit" name="submit" value="Registrar producto">
    </form>
    </div>
</div>