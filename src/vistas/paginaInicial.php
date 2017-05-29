<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';

$nomUsuario = $_SESSION ["nomUsuario"];
?>

<?php include 'sidebar.php' ?>



<div align="left">
	<h3>Bienvenid@ <?= $nomUsuario;?></h3>
</div>

<br />
<br />
<div>
	<table border="0">
		<tr>
			<td>Usuarios</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>Aquí podrá consultar los usuarios actuales y dar de alta nuevos.</td>
		</tr>
		<tr>
			<td>Productos</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>Aquí podrá dar de alta nuevos productos, con stock inicial, y
				consultar los existentes.</td>
		</tr>
		<tr>
			<td>Ventas</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>Realizar nueva venta y consultar las anteriores.</td>
		</tr>
		<!-- 
								<tr><td>Gastos</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Gastos realizados adicionales a las compras de materiales.</td></tr>
								<tr><td>Compras</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Registro y consulta de compras de material.</td></tr>
								 -->
		<tr>
			<td>Salir</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>Cierra sesion y sale del sistema.</td>
		</tr>
	</table>
</div>

<?php include 'footer.php'?>