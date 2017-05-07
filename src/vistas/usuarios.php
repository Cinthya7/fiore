<?php
	include 'header.php';
?>

Bienvenido %USUARIO%

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
						
						
						$result = $conn->query("select id_usuario,nombre from usuarios");
						
						if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<tr>";
								echo	"<td>".$row["id_usuario"]."</td>";
								echo	"<td>".$row["nombre"]."</td>";
								echo	"<td><a href='modificarUsuario.php?id_usuario=".$row["id_usuario"]."'>MODIFICAR</a></td>";
								echo	"<td><a href='eliminarUsuario.php?id_usuario=".$row["id_usuario"]."'>ELIMINAR</a></td>";
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