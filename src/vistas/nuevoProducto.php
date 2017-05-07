<?php
	include 'header.php';
?>

	<label>Nuevo Producto</label>

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
				<td>SUCURSAL</td>
				<td>
					<select name="sucursal">
						<option>SUC 1</option>
						<option>SUC 2</option>
					</select>
				<td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
					<input type="submit"/>
					<input type="reset" />
				</td>
			</tr>
		
		</table>
	
	</form>

</body>
</html>