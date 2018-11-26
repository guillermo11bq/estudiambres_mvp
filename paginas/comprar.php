
<?php 
    
$clienteSOAP = new SoapClient(null, [
        'uri' => 'http://localhost/',
        'location' => 'https://www.upmhworld.com/estudihambres/servicioWeb/wsclass.php']);
            $verProductos = $clienteSOAP -> verTodosProductos();


?>

<div class="alinear">
    <h2 class="alinear">Productos Disponibles</h3>
    <i class="fas fa-search alinear"></i>
    <input type="text" class="alinear" placeholder="Buscar">    
</div>
<hr>
<div class="">
<section id="productos" class="card-grid">
    <?php foreach($verProductos as $producto): 
    ?><a href="?op=detalleproducto&amp;id=<?=$producto['idPro'] ?>"><div class="card">
  <img class="tableimg" src="images/<?=$producto['fotoPro'] ?>" >
  <div class="container">
    <h4><b><?=$producto['nombrePro'] ?></b></b></h4> 
    <p>$<?=$producto['precioPro'] ?></p> 
  </div>
</div></a><?php endforeach; ?>
</section>
</div>