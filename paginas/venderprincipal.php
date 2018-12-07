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
            
            
if (isset( $_POST['editar'] )) {
    $idProducto = $_POST['id'];
    $precioo = $_POST['price'];
    $cantidadd = $_POST['cantidad'];
    $nombree = $_POST['name'];
    $editarpoco = $clienteSOAP -> editarMismoProducto($idProducto, $precioo, $cantidadd, $nombree);
    
} 

if (isset( $_POST['borrar'] )) {
    $idProducto = $_POST['id'];
    $borrarproducto = $clienteSOAP -> borrarProducto($idProducto);
}  
            

$verProductos = $clienteSOAP -> mostrarMisProductos($idUsuario);
?>

<div class="barra1">
<div class="alinear titledis">
Nuevo producto
</div>
<div class="alinear pullright ">

<button class="addproduct"><a style="color: #ffffff; text-decoration: none" href="?op=nuevoproducto"><span class="icon-plus"></span>Agregar Nuevo</a></button>
</div>
</div>

<div class="centertable">
    <?php foreach($verProductos as $producto): ?>
    <form method="POST" id="form-<?= $producto['idPro'] ?>">
        <input type="hidden" name="id" value="<?= $producto['idPro'] ?>">
    </form>
    <?php endforeach; ?>
    
  <table class="tableVender">
    <tr class="trVender">
      <th></th>
      <th>Nombre</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th></th>
      <th></th>
    </tr>
        <?php foreach($verProductos as $producto): ?>
            <tr>

      <td><img class="tableimg" src="images/<?=$producto['fotoPro'] ?>" ></td>
      <td><input type="text" class="inputName" value="<?=$producto['nombrePro'] ?>" name="name" form="form-<?= $producto['idPro'] ?>"></td>
      <td><button class="circulo" data-function="minus"><i class="fas fa-minus"></i></button>
      <input class="inputCantidad" type="text" name="cantidad" data-function="cantidad" value="<?=$producto['cantidadPro']?>" form="form-<?= $producto['idPro'] ?>">
      <button class="circulo" data-function="plus"><i class="fas fa-plus"></i></button>
      </td>
      <td>$<input class="inputCantidad" type="number" value="<?=$producto['precio']?>" name="price" form="form-<?= $producto['idPro'] ?>"></td>
      <td><button name="borrar" type="submit" form="form-<?= $producto['idPro'] ?>"  class="actionButton searchbtn"><i class="fas fa-trash-alt fa-2x"></i></button></td>  
      <td><button type="submit" name="editar" form="form-<?= $producto['idPro'] ?>" class="actionButton searchbtn"><i class="fas fa-save fa-2x"></i></button></td>
          </tr>

      <?php endforeach; ?>

  </table>
</div>

<script>
    $('button[data-function=minus]').click(function(){
        var $inputCantidad = $(this).siblings("input[data-function=cantidad]");
        $inputCantidad.val( parseInt($inputCantidad.val()) - 1 );
    });
    
    $('button[data-function=plus]').click(function(){
        var $inputCantidad = $(this).siblings("input[data-function=cantidad]");
        $inputCantidad.val( parseInt($inputCantidad.val()) + 1 );
    });
    
</script>
<?php endif; ?>


