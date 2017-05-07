<?php
	include 'header.php';
?>

Bienvenido %USUARIO%

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
						<td><b>MODIFICAR</b></td>
						<td><b>ELIMINAR</b></td>
					</tr>
					
					<?php
					
						include '../utils/conexion.php';
						
						
						$result = $conn->query("select id_producto,id_productop,id_productof,descripcion,cantidad,imagen,id_sucursal from productos");
						
						if($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<tr>";
								echo	"<td>".$row["id_productop"]."</td>";
								echo	"<td>".$row["id_productof"]."</td>";
								echo	"<td>".$row["descripcion"]."</td>";
								echo	"<td>".$row["cantidad"]."</td>";
								echo	"<td><a href='modificarProducto.php?id_producto=".$row["id_producto"]."'>MODIFICAR</a></td>";
								echo	"<td><a href='eliminarProducto.php?id_producto=".$row["id_producto"]."'>ELIMINAR</a></td>";
								echo "</tr>";
							}
						} else {
							echo "<tr><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td></tr>";
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