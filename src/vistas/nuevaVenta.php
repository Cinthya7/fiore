<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
include '../utils/conexion.php';
?>

<?php include 'sidebar.php' ?>

<div align="left">
	<h3>Nueva Venta</h3>
</div>

<br />
<br />

<form action="../scripts/registroVenta.php" method="POST">

	<table border="0" align="center" style="margin-top: 5%">
		<tr>
			<td>MONTO</td>
			<td><input type="text" id="monto" name="monto" value="0.00" /></td>
		</tr>
		<tr>
			<td>USUARIO</td>
			<td><select name="usuario">
							<?php
							
							$result = $conn->query ( "SELECT ID_USUARIO, NOMBRE FROM USUARIOS WHERE ACTIVO = TRUE" );
							
							if (! $result) {
								trigger_error ( 'Invalid query: ' . $conn->error );
							} else {
								if ($result->num_rows > 0) {
									while ( $row = $result->fetch_assoc () ) {
										$selected = '';
										if ($row ["ID_USUARIO"] == $_SESSION ["id_usuario"])
											$selected = 'selected="selected"';
										
										echo '<option value="' . $row ["ID_USUARIO"] . '" ' . $selected . '>' . $row ["ID_USUARIO"] . ' - ' . $row ["NOMBRE"] . '</option>';
									}
								}
							}
							?>
							</select></td>
		</tr>
		<tr>
			<td>FECHA</td>
			<td><input type="text" name="fecha"
				value="<?php
				$tz = 'America/Mexico_City';
				$timestamp = time ();
				$dt = new DateTime ( "now", new DateTimeZone ( $tz ) ); // first argument "must" be a string
				$dt->setTimestamp ( $timestamp ); // adjust the object to correct timestamp
				echo $dt->format ( 'd/m/Y' );
				?>" /></td>
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
						<td colspan="3"><input type="button" value="Otro"
							onClick="agregaProducto()" /></td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" /> <input
				type="reset" onClick="eliminaProductos()" /></td>
		</tr>

	</table>

</form>

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
	
	col1.innerHTML = seleccion.innerHTML.replace(/#/g,numFila);
	col2.innerHTML = "<input type=\"text\" id=\"cantidad_"+numFila+"\" name=\"cantidad_"+numFila+"\" onChange=\"cambiaCantidad("+numFila+")\" value=\"1\"/>";
	
	numFila++;
}

function cambiaCantidad(numero) {
	
	var i = 1;
	var monto = document.getElementById("monto");
	monto.value = "0";
	
	while(document.getElementById("producto_"+i) != null) {
		var producto = document.getElementById("producto_" + i).value;
		if(producto != "-1") {
			var cantidad = parseFloat(document.getElementById("cantidad_" + i).value);
			
			var precio = parseFloat(producto.substr(producto.indexOf("$")+1));
			
			monto.value = parseFloat(monto.value) + (precio * cantidad);
		}
		
		i++;
	}
}

function eliminaProductos() {
	var productos = document.getElementById("productos");
	productos.innerHTML = "<tr><td>PRODUCTO</td><td>CANTIDAD</td></tr><tr><td>N/A</td><td>N/A</td></tr><tr><td colspan=\"3\"><input type=\"button\" value=\"Otro\" onClick=\"agregaProducto()\"/></td></tr>";
	
	numFila = 1;
}

</script>

<!-- la base de los productos obtenidos de base de datos -->
<div id="baseProductos" style="visibility: hidden;">
	<select id="producto_#" name="producto_#" onChange="cambiaCantidad()">
		<option value="-1">Seleccionar</option>
		<?php
		
		$result = $conn->query ( "SELECT ID_PRODUCTO, ID_PRODUCTOP, ID_PRODUCTOF, DESCRIPCION, CANTIDAD, IMAGEN, PRECIO_UNIT FROM PRODUCTOS WHERE ACTIVO = TRUE" );
		
		if (! $result) {
			trigger_error ( 'Invalid query: ' . $conn->error );
		} else if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				echo '<option value="' . $row ['ID_PRODUCTO'] . '$' . $row ['PRECIO_UNIT'] . '">' . $row ['DESCRIPCION'] . ' --- $' . $row ['PRECIO_UNIT'] . '</option>';
			}
		}
		?>
	</select>
</div>

<?php include 'footer.php' ?>