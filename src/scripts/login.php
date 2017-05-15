<?php
	session_start();
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	include '../utils/conexion.php';
	
	$sql = "SELECT * FROM USUARIOS WHERE ID_USUARIO = '$usuario' AND PASSWORD = '" . md5($password) . "'";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION["id_usuario"] = $usuario;
			$_SESSION["nomUsuario"] = $row['NOMBRE'];
			
			header("Location: ../vistas/paginaInicial.php");
		} else {
			header("Location: ../vistas/usuarioIncorrecto.php");
		}
	}
?>