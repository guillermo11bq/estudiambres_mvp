<?php

$pagina = isset($_GET['op'])?strtolower($_GET['op']):'comprar';

require_once 'paginas/menu.php';
require_once 'paginas/'.$pagina.'.php';
require_once 'paginas/footer.php';
?>