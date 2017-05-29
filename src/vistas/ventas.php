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

<table width="100%"
	class="table table-striped table-bordered table-hover"
	id="dataTables-example">
	<thead>
		<tr>
			<td><b>ID VENTA</b></td>
			<td><b>MONTO</b></td>
			<td><b>USUARIO</b></td>
			<td><b>FECHA</b></td>
			<!-- <td><b>MODIFICAR</b></td> -->
			<!-- <td><b>DESACTIVAR</b></td> -->
		</tr>
	</thead>
	<tbody>
					
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
	</tbody>
</table>
<a href="nuevaVenta.php" class="btn btn-primary">Hacer venta</a>
<?php include 'footer.php' ?>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,

            "language": {
  	           "info": "Mostrando registros _START_ a _END_ del total de _TOTAL_",

  	         	"paginate": {
				   "next": "Página siguiente",
				   "previous": "Página anterior"
				 },

				 "emptyTable": "No hay datos para mostrar",
				 "infoEmpty": "No hay datos para mostrar",
				 "lengthMenu": "Mostrar _MENU_ usuarios por página",
				 "search": "Buscar:"
  	         }
        });
        
    });
</script>