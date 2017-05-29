<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
include '../utils/conexion.php';
?>

<?php include 'sidebar.php' ?>

<br />
<br />

<div class="panel panel-default">
	<div class="panel-heading">Nueva Venta</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form role="form" action="../scripts/registroVenta.php"
					method="POST">
					<div class="form-group">
						<label>Monto</label>
						<div class="form-group input-group">
							<span class="input-group-addon">$</span> <input
								class="form-control" name="monto" id="monto"
								placeholder="Monto total" maxlength="13" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label>Usuario</label> <select class="form-control" name="usuario"
							required="required">
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
						</select>
					</div>

					<div class="form-group">
						<label>Fecha</label> <input class="form-control" name="fecha"
							type="date" id="fecha">
					</div>

					<div class="form-group">
						<table class="table table-striped table-bordered table-hover"
							id="productos">
							<thead>
								<tr>
									<th>Producto</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>NA</td>
									<td>NA</td>
								</tr>
								<tr>
									<td colspan="2"><input class="btn btn-primary" type="button"
										value="Otro" onClick="agregaProducto()" /></td>
								</tr>
							</tbody>
						</table>
					</div>

					<button type="submit" class="btn btn-default">Enviar</button>
					<button type="reset" class="btn btn-default"
						onclick="eliminaProductos()">Limpiar campos</button>
				</form>
			</div>
		</div>
	</div>
</div>


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
	col2.innerHTML = "<input class=\"form-control\" type=\"text\" id=\"cantidad_"+numFila+"\" name=\"cantidad_"+numFila+"\" onChange=\"cambiaCantidad("+numFila+")\" value=\"1\"/>";
	
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
	productos.innerHTML = "<thead><tr><th>Producto</th><th>Cantidad</th></tr></thead><tbody><tr><td>NA</td><td>NA</td></tr><tr><td colspan=\"2\"><input class=\"btn btn-primary\" type=\"button\" value=\"Otro\"onClick=\"agregaProducto()\" /></td></tr></tbody>";
	
	numFila = 1;
}

</script>

<!-- la base de los productos obtenidos de base de datos -->
<div id="baseProductos" style="visibility: hidden;">
	<select class="form-control" id="producto_#" name="producto_#"
		onChange="cambiaCantidad()">
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