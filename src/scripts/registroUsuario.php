<?php
	$usuario = $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$pass = $_POST['pass'];
	
	include '../utils/conexion.php';
	
	$sql = "INSERT INTO USUARIOS(ID_USUARIO, NOMBRE, PASSWORD, ACTIVO) VALUES ('$usuario','$nombre', '" . md5($pass) . "',TRUE)";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		header("Location: ../vistas/paginaInicial.php");
	}
?>