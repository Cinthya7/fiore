<?php

include '../utils/conexion.php';

// Guarda en dos arreglos relacionados los N productos (producto[i] -> cantidad[i])
$i = 1;
$productos = array();
while(isset($_POST["producto_".$i])) {
	$productos[$i] = $_POST["producto_".$i];
	$i++;
}

$i = 1;
$cantidades = array();
while(isset($_POST["cantidad_".$i])) {
	$cantidades[$i] = $_POST["cantidad_".$i];
	$i++;
}

$usuario = $_POST["usuario"];
$monto = $_POST["monto"];
$fechaa = $_POST["fecha"];

$fecha =  date_format(DateTime::createFromFormat('d/m/Y', $fechaa), 'Y-m-d');

$conn->query("INSERT INTO VENTAS(MONTO,ID_USUARIO,FECHA) VALUES($monto, '$usuario', '$fecha')");
$auto_id = $conn->insert_id;

for($i=1; $i<=count($productos); $i++) {
	$id_producto = substr($productos[$i],0,strpos($productos[$i], "$"));
	$precio = substr($productos[$i],strpos($productos[$i],"$")+1);
	$cantidad = $cantidades[$i];
	
	
	$conn->query("INSERT INTO VENTA_PROD(ID_VENTA, ID_PRODUCTO, CANTIDAD, PRECIO_UNIT) VALUES($auto_id, $id_producto, $cantidad, $precio)");
	$conn->query("UPDATE PRODUCTOS SET CANTIDAD = CANTIDAD - $cantidad WHERE ID_PRODUCTO = $id_producto");
}

header("Location: ../vistas/ventas.php");

?>