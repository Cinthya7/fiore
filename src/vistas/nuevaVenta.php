<?php
	session_start();
	
	if(!isset($_SESSION["id_usuario"]))
		header("Location: index.php");

	include 'header.php';
?>

<div align="left"><h3>Nueva Venta</h3></div>

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
						<td>MONTO</td>
						<td><input type="text" name="id_productof"/></td>
					</tr>
					<tr>
						<td>USUARIO</td>
						<td><input type="text" name="descripcion"/></td>
					</tr>
					<tr>
						<td>FECHA</td>
						<td><input type="text" name="cantidad"/></td>
					</tr>
					
					<tr>
						<td colspan="2">
							<table border="0" id="productos">
								<tr>
									<td>PRODUCTO</td>
									<td>CANTIDAD</td>
								</tr>
								<tr>									
									<td>N/A</td>
									<td>N/A</td>
								</tr>
								<tr>
									<td colspan="2"><input type="button" value="Otro" onClick="agregaProducto()"/></td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr>
						<td colspan="2" align="center">
							<input type="submit"/>
							<input type="reset" />
						</td>
					</tr>
				
				</table>
			
			</form>
	</tr>
</table>

<script type="text/javascript">

var numFila = 1;

function agregaProducto() {
	var productos = document.getElementById("productos");
	var seleccion = document.getElementById("baseProductos");
	
	if(numFila == 1)
		productos.deleteRow(1);
	
	var fila = productos.insertRow(numFila);
	var col1 = fila.insertCell(0);
	var col2 = fila.insertCell(1);
	
	col1.innerHTML = seleccion.innerHTML.replace(/#/,numFila);
	col2.innerHTML = "<input type=\"text\" name=\"cantidad_"+numFila+"\"/>";
	
	numFila++;
}

</script>

<!-- la base de los productos obtenidos de base de datos -->
<div id="baseProductos" style="visibility: hidden;">
	<select name="producto_#">
		<option value="-1">Seleccionar</option>
		<?php
			include '../utils/conexion.php';
			
			$result = $conn->query("SELECT ID_PRODUCTO, ID_PRODUCTOP, ID_PRODUCTOF, DESCRIPCION, CANTIDAD, IMAGEN, PRECIO_UNIT FROM PRODUCTOS WHERE ACTIVO = TRUE");
			
			if(!$result) {
				trigger_error('Invalid query: ' . $conn->error);
			} else if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<option value="'.$row['ID_PRODUCTO'].'">'.$row['DESCRIPCION'].'</option>';
				}
			}
		?>
	</select>
</div>

</body>
</html>