<?php
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	include '../utils/constants.php';
	include $UTIL_CONEXION;
	
	$sql = "select * from tc_usuarios where id_usuario = '$usuario' and password = '" . md5($password) . "'";
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		if($result->num_rows > 0) {
			header("Location: $VISTA_PAGINA_INICIAL");
		} else {
			header("Location: $VISTA_USUARIO_INCORRECTO");
		}
	}
?>