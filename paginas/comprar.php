
<?php 
    
$clienteSOAP = new SoapClient(null, [
        'uri' => 'http://localhost/',
        'location' => 'https://www.upmhworld.com/estudihambres/servicioWeb/wsclass.php']);
        
if(isset( $_GET['busca'] )) {
    $stringBusqueda = $_GET['busca'];
    $verProductos = $clienteSOAP -> verProductosBusqueda($stringBusqueda);
} else {
            $verProductos = $clienteSOAP -> verTodosProductos();
}

?>

<div class="barra1">
<div class="alinear titledis">
Productos disponibles
</div>
<div class="alinear pullright busquedalinea">
<form><input type="text" name="busca" placeholder="Buscar" class="busquedaInput"
value="<?=isset($stringBusqueda) ? $stringBusqueda : '' ?>"><button type="submit"
class="searchbtn"><i class="fas fa-search" class="busquedaButton"></i></button><form>
</div>
</div>

<div class="">
<section id="productos" class="card-grid">
    <?php foreach($verProductos as $producto): 
    ?><a href="?op=detalleproducto&amp;id=<?=$producto['idPro'] ?>"><div class="card">
  <div class="productImageRegular" style="background-image: url('images/<?=$producto['fotoPro'] ?>')"></div>
  <!--<img class="tableimg" src="images/<?=$producto['fotoPro'] ?>" >-->
  <div class="container">
    <h4 class="black tituloCardCompra"><b><?=$producto['nombrePro'] ?></b></b></h4> 
    <p class="gray">$<?=$producto['precioPro'] ?></p> 
  </div>
</div></a><?php endforeach; ?>
</section>
</div>