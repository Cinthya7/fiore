<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
include '../utils/conexion.php';

$id_usuario = $_GET ["id_usuario"];

$result = $conn->query ( "SELECT ID_USUARIO,NOMBRE,ACTIVO FROM USUARIOS WHERE ID_USUARIO = $id_usuario" );

if (! $result) {
	trigger_error ( 'Invalid query: ' . $conn->error );
} else {
	$row = $result->fetch_assoc ();
}
?>
<?php include 'sidebar.php' ?>
<div align="left">
	<h3>Modificar Usuario</h3>
</div>

<br />
<br />

<form action="../scripts/actualizacionUsuario.php" method="POST">

	<table border="0" align="center" style="margin-top: 5%">

		<tr>
			<td>Usuario</td>
			<td><input type="text" name="usuario" readonly="true"
				value="<?= $id_usuario;?>" /></td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td><input type="text" name="nombre" value="<?= $row["NOMBRE"] ?>" /></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" /></td>
		</tr>

	</table>

</form>
<?php include 'footer.php' ?>