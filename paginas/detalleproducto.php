<?php 

        
    $id = $_GET['id'];
        $clienteSOAP = new SoapClient(null, ['uri' => 'http://localhost/',
        'location' => 'https://www.upmhworld.com/estudihambres/servicioWeb/wsclass.php']);
            $verunproducto = $clienteSOAP -> verunproducto($id);


?>


<?foreach ($verunproducto as $producto):?>
<div class="carddetalle">
    <div class="productImage" style="background-image: url('images/<?=$producto['fotoPro'] ?>')"></div>
  <!--<img src="images/<?=$producto['fotoPro'] ?>" class="imgunica">-->
  <div class="detallesCard">
      <h1><?php echo $producto['nombrePro'];?></h1>
    <p class="gray grey">$<?=$producto['precio']?><p><br>
    <p> Descripción: <?php echo $producto['descripcion'];?></p>
  <div class="botonesContacto">
    <a class="aProducto" href="https://api.whatsapp.com/send?phone=521<?=$producto['celular']?>&text=Hola me interesa comprar un producto">
        <i class="fab fa-whatsapp fa-2x"></i>
        </a> 
    <!--<a  class="aProducto" href="#"><i class="fab fa-facebook-messenger"></i></a>-->
    <a  class="aProducto" href="sms:521<?=$producto['celular']?>"><i class="far fa-comment-alt fa-2x"></i></a> 
 </div>
 <hr>
 <h2>Detalles del vendedor</h2><br>
     <?php echo $producto['username'];?> <br>
     tambien conocido como "<?php echo $producto['alias'];?>" <br>
     Contacto: <?php echo $producto['celular'];?>
 
  </div>
  
</div>
<?endforeach;?>