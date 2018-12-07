<?php

class clsClass{

	public function registrarUsuario($nombre, $apellidoP, $telefonocelular, $contrasena, $apellidoM = 'NULL', $alias = 'NULL') {
		$apellidoM = ($apellidoM) ? "'$apellidoM'" : 'NULL';
		$alias = ($alias) ? "'$alias'" : 'NULL';
		$datos = false;
		if($conn= mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres"))
		{
			$consulta = mysqli_query($conn, "CALL spRegistrarUsuario('$nombre', '$apellidoP', $apellidoM, $alias, '$telefonocelular', '$contrasena')");
			while($resultado = mysqli_fetch_assoc($consulta))
			{
				foreach ($resultado as $key => $value) {
					if ($key == 'ID') {
						$datos = $value;
					}
				}
			}
		}
		mysqli_close($conn);
		return $datos;
	}

	public function acceso($usuario,$contrasena){

		$datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){


			$renglon = mysqli_query($conn,"CALL spValidarAcceso('$usuario','$contrasena')");
			while($resultado=mysqli_fetch_assoc($renglon)){
				if((int)$resultado['ID']!=0)
				{
					$datos = array();
					$datos["ID"]=$resultado["ID"];
					$datos["NOMBRE"]=$resultado["NOMBRE"];

				}
			}
			mysqli_close($conn);
		}
		return $datos;
	}


	public function mostrarMisProductos($id){
		$datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){


			$renglon = mysqli_query($conn,"CALL verMisProductos($id)");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos[]=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}
	
	public function verTodosProductos(){
	    $datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){


			$renglon = mysqli_query($conn,"CALL verTodosProductos()");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos[]=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}
	
	public function verProductosBusqueda($aguja){
	    $datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){


			$renglon = mysqli_query($conn,"CALL busquedaProducto('$aguja')");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos[]=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}

	
    public function borrarProducto($productoID){
	    $datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){


			$renglon = mysqli_query($conn,"CALL borrarProducto($productoID)");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos[]=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}
	
	public function verunproducto($productoID){
	    $datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){


			$renglon = mysqli_query($conn,"CALL verunproducto($productoID)");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos[]=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}
	
	
	public function verCantidadProducto($productoID){
	    $datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){

			$renglon = mysqli_query($conn,"CALL verCantidadProducto($productoID)");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos[]=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}
	
	public function editarMismoProducto($productoID,$precio,$cantidad,$nombre){
	    $datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){

			$renglon = mysqli_query($conn,"CALL editarProducto($productoID,$precio,'$nombre',$cantidad)");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos[]=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}

	public function editarUsuario($usuarioID,$nombre,$apellidopaterno,$apellidomaterno, $alias, $celular){
	    $datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){

			$renglon = mysqli_query($conn,"CALL editarUser($usuarioID,'$nombre','$apellidopaterno','$apellidomaterno', '$alias', '$celular')");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos[]=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}
	
	public function verUser($usuarioID){
	    $datos=false;

		if($conn = mysqli_connect("localhost","upmhworl", "Fcheck2019", "upmhworl_estudihambres")){

			$renglon = mysqli_query($conn,"CALL verUser($usuarioID)");
			while($resultado=mysqli_fetch_assoc($renglon)){
				$datos=$resultado;
			}
			mysqli_close($conn);
		}
		return $datos;
	}

}
?>