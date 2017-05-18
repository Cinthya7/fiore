<?php

include '../utils/conexion.php';

$i = 1;
$productos = array();
while($_POST("producto_".$i) != null)
	$productos[i] = $_POST["producto_".$i++];


$i = 1;
$cantidades = array();
while($_POST("cantidad_".$i) != null)
	$cantidades[i] = $_POST["cantidad_".$i++];


echo $productos . "<br/>";
echo $cantidades;

?>