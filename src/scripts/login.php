<?php
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	include '../utils/conexion.php';
	
	$sql = "select * from usuarios where id_usuario = '$usuario' and password = '" . md5($password) . "'";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		if($result->num_rows > 0) {
			header("Location: ../vistas/paginaInicial.php");
		} else {
			header("Location: ../vistas/usuarioIncorrecto.php");
		}
	}
?>