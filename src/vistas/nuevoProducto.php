<?php
	include 'header.php';
?>

<div align="left"><h3>Nuevo Producto</h3></div>

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
			<form action="../scripts/registroProducto.php" method="POST">
			
				<table border="0" align="center" style="margin-top: 5%">
				
					<tr>
						<td>ID PROVEEDOR</td>
						<td><input type="text" name="id_productop"/></td>
					</tr>
					<tr>
						<td>ID FIORE E D</td>
						<td><input type="text" name="id_productof"/></td>
					</tr>
					<tr>
						<td>DESCRIPCION</td>
						<td><input type="text" name="descripcion"/><td>
					</tr>
					<tr>
						<td>CANTIDAD</td>
						<td><input type="text" name="cantidad"/><td>
					</tr>
					<tr>
						<td>PRECIO UNITARIO</td>
						<td><input type="text" name="precio_unit"/></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit"/>
							<input type="reset" />
						</td>
					</tr>
				
				</table>
			
			</form>
	<tr>
<table>

</body>
</html>