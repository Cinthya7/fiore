<?php

	$id_usuario = $_POST["usuario"];
	$nomUsuario = $_POST["nombre"];
	
	include '../utils/conexion.php';
	
	$sql = "UPDATE USUARIOS SET NOMBRE = '$nomUsuario' WHERE ID_USUARIO='$id_usuario'";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		header("Location: ../vistas/usuarios.php");
	}
?>