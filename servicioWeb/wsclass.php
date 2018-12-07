<?php
	include 'clsClass.class.php';
	$soap= new SoapServer(null, array('uri' => 'http://localhost/'));
	$soap->setClass('clsClass');
	$soap-> handle();
?>