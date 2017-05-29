<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
?>
<?php include 'sidebar.php' ?>
<div align="left">
	<h3>Nuevo Usuario</h3>
</div>

<br />
<br />
<form action="../scripts/registroUsuario.php" method="POST">

	<table border="0" align="center" style="margin-top: 5%">

		<tr>
			<td>Usuario</td>
			<td><input type="text" name="usuario" /></td>
		</tr>
		<tr>
			<td>Nombre</td>
			<td><input type="text" name="nombre" /></td>
		</tr>
		<tr>
			<td>Contraseña</td>
			<td><input type="password" name="pass" /></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" /></td>
		</tr>

	</table>

</form>
<?php include 'footer.php' ?>