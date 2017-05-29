<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
?>

<?php include 'sidebar.php' ?>

<div align="left">
	<h3>Usuarios</h3>
</div>
<table border="1">
	<tr>
		<td><b>ID USUARIO</b></td>
		<td><b>NOMBRE</b></td>
		<td><b>MODIFICAR</b></td>
		<!--  <td><b>DESACTIVAR</b></td> -->
	</tr>
					
					<?php
					
					include '../utils/conexion.php';
					
					$result = $conn->query ( "SELECT ID_USUARIO,NOMBRE FROM USUARIOS ORDER BY ID_USUARIO ASC" );
					
					if (! $result) {
						trigger_error ( 'Invalid query: ' . $conn->error );
					} else if ($result->num_rows > 0) {
						while ( $row = $result->fetch_assoc () ) {
							echo "<tr>";
							echo "<td>" . $row ["ID_USUARIO"] . "</td>";
							echo "<td>" . $row ["NOMBRE"] . "</td>";
							echo "<td><a href='modUsuario.php?id_usuario=" . $row ["ID_USUARIO"] . "'>MODIFICAR</a></td>";
							// echo "<td><a href='desactivarUsuario.php?id_usuario=".$row["ID_USUARIO"]."'>DESACTIVAR</a></td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td>NA</td><td>NA</td><td>NA</td></tr>";
					}
					
					?>
				</table>
<a href="nuevoUsuario.php">Crear nuevo usuario</a>

<?php include 'footer.php'?>