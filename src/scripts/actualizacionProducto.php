<?php
	$id_producto = $_POST['id_producto'];
	$id_productop = $_POST['id_productop'];
	$id_productof = $_POST['id_productof'];
	$descripcion = $_POST['descripcion'];
	$cantidad = $_POST['cantidad'];
	$precio_unit = $_POST['precio_unit'];
	
	include '../utils/conexion.php';
	
	$sql = "UPDATE PRODUCTOS SET ID_PRODUCTOP = $id_productop, ID_PRODUCTOF = '$id_productof', DESCRIPCION = '$descripcion', CANTIDAD = $cantidad, PRECIO_UNIT = $precio_unit WHERE ID_PRODUCTO = $id_producto";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		header("Location: ../vistas/productos.php");
	}
?>