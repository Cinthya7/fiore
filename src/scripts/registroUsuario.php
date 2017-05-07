<?php
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	include '../utils/conexion.php';
	
	$sql = "insert into usuarios(id_usuario, password) values ($usuario, '" . md5($password) . "')";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		header("Location: ../vistas/paginaInicial.php");
	}
?>