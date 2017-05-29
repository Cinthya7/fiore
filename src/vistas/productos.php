<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
?>
<?php include 'sidebar.php' ?>
<div align="left">
	<h3>Productos</h3>
</div>

<table width="100%"
	class="table table-striped table-bordered table-hover"
	id="dataTables-example">
	<thead>
		<tr>
			<th>ID PROVEEDOR</th>
			<th>ID FIORE E D</th>
			<th>DESCRIPCION</th>
			<th>CANTIDAD</th>
			<th>PRECIO UNITARIO</th>
			<th>MODIFICAR</th>
		</tr>
	</thead>
	<tbody>
					
		<?php
		
		include '../utils/conexion.php';
		
		$result = $conn->query ( "SELECT ID_PRODUCTO,ID_PRODUCTOP,ID_PRODUCTOF,DESCRIPCION,CANTIDAD,IMAGEN,PRECIO_UNIT FROM PRODUCTOS ORDER BY ID_PRODUCTOP,ID_PRODUCTOF" );
		
		if (! $result) {
			trigger_error ( 'Invalid query: ' . $conn->error );
		} else if ($result->num_rows > 0) {
			while ( $row = $result->fetch_assoc () ) {
				echo "<tr>";
				echo "<td>" . $row ["ID_PRODUCTOP"] . "</td>";
				echo "<td>" . $row ["ID_PRODUCTOF"] . "</td>";
				echo "<td>" . $row ["DESCRIPCION"] . "</td>";
				echo "<td>" . $row ["CANTIDAD"] . "</td>";
				echo "<td>" . $row ["PRECIO_UNIT"] . "</td>";
				echo "<td><a href='modProducto.php?id_producto=" . $row ["ID_PRODUCTO"] . "'>MODIFICAR</a></td>";
				// echo "<td><a href='eliminarProducto.php?id_producto=".$row["ID_PRODUCTO"]."'>DESACTIVAR</a></td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td></tr>";
		}
		
		?>
	</tbody>
</table>
<a href="nuevoProducto.php" class="btn btn-primary">Dar de alta nuevo producto</a>
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