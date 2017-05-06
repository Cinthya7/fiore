<?php
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	
	include 'connection.php';
	
	$sql = "select * from tc_usuarios where id_usuario = '$usuario' and password = '" . md5($password) . "'";
	
	$result = $conn->query($sql);
	
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {	
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "usuario: " . $row["id_usuario"];
			}
		}
	}
?>