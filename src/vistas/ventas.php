<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
?>

<?php include 'sidebar.php' ?>
<div align="left">
	<h3>Ventas</h3>
</div>

<table border="1">
	<tr>
		<td><b>ID VENTA</b></td>
		<td><b>MONTO</b></td>
		<td><b>USUARIO</b></td>
		<td><b>FECHA</b></td>
		<!-- <td><b>MODIFICAR</b></td> -->
		<!-- <td><b>DESACTIVAR</b></td> -->
	</tr>
					
					<?php
					
					include '../utils/conexion.php';
					
					$result = $conn->query ( "SELECT ID_VENTA, MONTO, ID_USUARIO, FECHA FROM VENTAS ORDER BY FECHA DESC" );
					
					if (! $result) {
						trigger_error ( 'Invalid query: ' . $conn->error );
					} else if ($result->num_rows > 0) {
						while ( $row = $result->fetch_assoc () ) {
							echo "<tr>";
							echo "<td>" . $row ["ID_VENTA"] . "</td>";
							echo "<td>" . $row ["MONTO"] . "</td>";
							echo "<td>" . $row ["ID_USUARIO"] . "</td>";
							echo "<td>" . $row ["FECHA"] . "</td>";
							// echo "<td><a href='modificarProducto.php?id_producto=".$row["ID_VENTA"]."'>MODIFICAR</a></td>";
							// echo "<td><a href='eliminarProducto.php?id_producto=".$row["ID_VENTA"]."'>DESACTIVAR</a></td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td>NA</td><td>NA</td><td>NA</td><td>NA</td></tr>";
					}
					
					?>
				</table>
<a href="nuevaVenta.php">Hacer venta</a>
<?php include 'footer.php' ?>