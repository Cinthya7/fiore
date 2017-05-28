<?php
	$id_productop = $_POST['id_productop'];
	$id_productof = $_POST['id_productof'];
	$descripcion = $_POST['descripcion'];
	$cantidad = $_POST['cantidad'];
	$precio_unit = $_POST['precio_unit'];
	
	include '../utils/conexion.php';
	
	$sql = "INSERT INTO PRODUCTOS(ID_PRODUCTOP, ID_PRODUCTOF, DESCRIPCION, CANTIDAD, PRECIO_UNIT, ACTIVO) VALUES ('$id_productop','$id_productof','$descripcion',$cantidad,$precio_unit,TRUE)";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		header("Location: ../vistas/paginaInicial.php");
	}
?>