<?php
	include 'header.php';
?>

<div align="left"><h3>Gastos</h3></div>

<br/>
<br/>
<table border="0">
	<tr>
		<td>
			<div>
				<?php include 'sidebar.php' ?>
			</div>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		
		<td>
			<div>
				<table border="1">
					<tr>
						<td><b>ID USUARIO</b></td>
						<td><b>NOMBRE</b></td>
						<td><b>MODIFICAR</b></td>
						<td><b>ELIMINAR</b></td>
					</tr>
					
					<?php
					
						include '../utils/conexion.php';
						
						
						$result = $conn->query("SELECT ID_USUARIO,NOMBRE FROM USUARIOS ORDER BY ID_USUARIO ASC");
						
						if(!$result) {
							trigger_error('Invalid query: ' . $conn->error);
						} else if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<tr>";
								echo	"<td>".$row["ID_USUARIO"]."</td>";
								echo	"<td>".$row["NOMBRE"]."</td>";
								echo	"<td><a href='modificarUsuario.php?id_usuario=".$row["ID_USUARIO"]."'>MODIFICAR</a></td>";
								echo	"<td><a href='eliminarUsuario.php?id_usuario=".$row["ID_USUARIO"]."'>ELIMINAR</a></td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td>NA</td><td>NA</td><td>NA</td><td>NA</td></tr>";
						}
						
					?>
				</table>
				<a href="nuevoUsuario.php">Crear nuevo usuario</a>
			</div>
		</td>
	<tr>
<table>

</body>
</html>