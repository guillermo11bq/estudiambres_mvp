<?php if (!isset($_SESSION["USER"])):?>
<script>
            alert('NECESITAS ESTAR LOGUEADO PARA VENDER');
            document.location.href = '?op=Acceso.php';
            </script>
<?php else: 
    
$clienteSOAP = new SoapClient(null, [
        'uri' => 'http://localhost/',
        'location' => 'https://www.upmhworld.com/estudihambres/servicioWeb/wsclass.php']);
            $idUsuario = $_SESSION["USER"]['ID'];
            $verProductos = $clienteSOAP -> mostrarMisProductos($idUsuario);


?>
<div>
    <h1 align="center">Editar productos para su venta</h1>
    <button class="addproduct"><a style="color: #ffffff; text-decoration: none" href="?op=nuevoproducto"><span class="icon-plus"></span>Agregar Nuevo</a></button><br><br>
</div>
<div>
  <table class="tableVender">
    <tr class="trVender">
      <th>Foto</th>
      <th>Nombre</th>
      <th>Cantidad</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
        <?php foreach($verProductos as $producto): ?>
            <tr>

      <td><img class="tableimg" src="images/<?=$producto['fotoPro'] ?>" ></td>
      <td><?=$producto['nombrePro'] ?></td>
      <td><button class="circulo"><i class="fas fa-minus"></i></button><input class="inputCantidad" type="text" value="<?=$producto['cantidadPro']?>">
      <button class="circulo"><i class="fas fa-plus"></i></button></td>
      <td><button class="actionButton"><i class="far fa-edit fa-lg"></i></button></td>
      <td><button class="actionButton"><i class="far fa-trash-alt fa-lg"></i></button></td>  
          </tr>

      <?php endforeach; ?>

  </table>
</div>
<?php endif; ?>