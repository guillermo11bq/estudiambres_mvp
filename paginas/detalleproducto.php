<?php 

        
    $id = $_GET['id'];
        $clienteSOAP = new SoapClient(null, ['uri' => 'http://localhost/',
        'location' => 'https://www.upmhworld.com/estudihambres/servicioWeb/wsclass.php']);
            $verunproducto = $clienteSOAP -> verunproducto($id);


?>


<?foreach ($verunproducto as $producto):?>
<div class="carddetalle">
  <img src="images/<?=$producto['fotoPro'] ?>" class="imgunica">
  <h1><?php echo $producto['nombrePro'];?></h1>
  <p class="title">$20<p>
  <p>    <?php echo $producto['descripcion'];?></p>
  <div style="margin: 24px 0;">
    <a class="aProducto" href="#"><i class="fab fa-whatsapp"></i></a> 
    <a  class="aProducto" href="#"><i class="fab fa-facebook-messenger"></i></a>
    <a  class="aProducto" href="#"><i class="far fa-comment-alt"></i></a> 
 </div>
 <div>
     "<?php echo $producto['alias'];?>" <br>
     <?php echo $producto['username'];?> <br>
     <?php echo $producto['celular'];?>
 </div>
</div>
<?endforeach;?>