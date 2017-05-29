<?php
	session_start();
	
	if(!isset($_SESSION["id_usuario"]))
		header("Location: index.php");
	
	include 'header.php';
?>

<div align="left"><h3>Productos</h3></div>

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
						<td><b>ID PROVEEDOR</b></td>
						<td><b>ID FIORE E D</b></td>
						<td><b>DESCRIPCION</b></td>
						<td><b>CANTIDAD</b></td>
						<td><b>PRECIO UNITARIO</b></td>
						<td><b>MODIFICAR</b></td>
						<!--  <td><b>DESACTIVAR</b></td> -->
					</tr>
					
					<?php
					
						include '../utils/conexion.php';
						
						
						$result = $conn->query("SELECT ID_PRODUCTO,ID_PRODUCTOP,ID_PRODUCTOF,DESCRIPCION,CANTIDAD,IMAGEN,PRECIO_UNIT FROM PRODUCTOS ORDER BY ID_PRODUCTOP,ID_PRODUCTOF");
						
						if(!$result) {
							trigger_error('Invalid query: ' . $conn->error);
						} else if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<tr>";
								echo	"<td>".$row["ID_PRODUCTOP"]."</td>";
								echo	"<td>".$row["ID_PRODUCTOF"]."</td>";
								echo	"<td>".$row["DESCRIPCION"]."</td>";
								echo	"<td>".$row["CANTIDAD"]."</td>";
								echo	"<td>".$row["PRECIO_UNIT"]."</td>";
								echo	"<td><a href='modProducto.php?id_producto=".$row["ID_PRODUCTO"]."'>MODIFICAR</a></td>";
								//echo	"<td><a href='eliminarProducto.php?id_producto=".$row["ID_PRODUCTO"]."'>DESACTIVAR</a></td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td></tr>";
						}
						
					?>
				</table>
				<a href="nuevoProducto.php">Dar de alta nuevo producto</a>
			</div>
		</td>
	<tr>
<table>

</body>
</html>