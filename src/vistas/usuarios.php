<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
?>

<?php include 'sidebar.php' ?>

<div align="left">
	<h3>Usuarios</h3>
</div>

<table width="100%"
	class="table table-striped table-bordered table-hover"
	id="dataTables-example">
	<thead>
		<tr>
			<th>ID USUARIO</th>
			<th>NOMBRE</th>
			<th>MODIFICAR</th>
		</tr>
	</thead>
	<tbody>
		<?php
		
		include '../utils/conexion.php';
		
		$result = $conn->query ( "SELECT ID_USUARIO,NOMBRE FROM USUARIOS ORDER BY ID_USUARIO ASC" );
		
		if (! $result) {
			trigger_error ( 'Invalid query: ' . $conn->error );
		} else if ($result->num_rows > 0) {
			$i = 0;
			while ( $row = $result->fetch_assoc () ) {
				if ($i % 2 == 0)
					echo '<tr class="odd gradeX">';
				else
					echo '<tr class="even gradeC">';
				
				$i ++;
				echo "<td>" . $row ["ID_USUARIO"] . "</td>";
				echo "<td>" . $row ["NOMBRE"] . "</td>";
				echo "<td><a href='modUsuario.php?id_usuario=" . $row ["ID_USUARIO"] . "'>MODIFICAR</a></td>";
				// echo "<td><a href='desactivarUsuario.php?id_usuario=".$row["ID_USUARIO"]."'>DESACTIVAR</a></td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td>NA</td><td>NA</td><td>NA</td></tr>";
		}
		
		?>
</table>
<a href="nuevoUsuario.php">Crear nuevo usuario</a>



<?php include 'footer.php'?>

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