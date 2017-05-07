<?php
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	include $UTIL_CONEXION;
	
	$sql = "insert into tc_usuarios(id_usuario, password) values ($usuario, '" . md5($password) . "')";
	echo "<br/>";
	echo md5($password);
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		header("Location: $VISTA_PAGINA_INICIAL");
	}
?>