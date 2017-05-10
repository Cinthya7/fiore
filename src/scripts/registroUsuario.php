<?php
	$usuario = $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$password = $_POST['password'];
	
	include '../utils/conexion.php';
	
	$sql = "INSERT INTO USUARIOS(ID_USUARIO, NOMBRE, PASSWORD) VALUES ('$usuario','$nombre', '" . md5($password) . "')";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		header("Location: ../vistas/paginaInicial.php");
	}
?>