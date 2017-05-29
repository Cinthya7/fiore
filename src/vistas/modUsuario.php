<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
include '../utils/conexion.php';

$id_usuario = $_GET ["id_usuario"];

$result = $conn->query ( "SELECT ID_USUARIO,NOMBRE,ACTIVO FROM USUARIOS WHERE ID_USUARIO = $id_usuario" );

if (! $result) {
	trigger_error ( 'Invalid query: ' . $conn->error );
} else {
	$row = $result->fetch_assoc ();
}
?>
<?php include 'sidebar.php' ?>

<br />
<br />

<div class="panel panel-default">
	<div class="panel-heading">Actualizar Usuario</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form role="form" action="../scripts/actualizacionUsuario.php"
					method="POST">
					<div class="form-group">
						<label>Usuario</label> <input class="form-control" name="usuario"
							placeholder="Usuario" maxlength="10" autocomplete="off" required="required" value="<?= $id_usuario;?>" readonly="readonly">
					</div>
					<div class="form-group">
						<label>Nombre</label> <input class="form-control" name="nombre"
							placeholder="Nombre del usuario" maxlength="50" autocomplete="off" required="required" value="<?= $row["NOMBRE"] ?>">
					</div>
					<button type="submit" class="btn btn-default">Actualizar</button>
					<button type="reset" class="btn btn-default">Restaurar campos</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php include 'footer.php' ?>