<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
?>
<?php include 'sidebar.php' ?>

<br />
<br />

<div class="panel panel-default">
	<div class="panel-heading">Nuevo Usuario</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form role="form" action="../scripts/registroUsuario.php"
					method="POST">
					<div class="form-group">
						<label>Usuario</label> <input class="form-control" name="usuario"
							placeholder="Usuario" maxlength="10" autocomplete="off" autofocus="autofocus" required="required">
					</div>
					<div class="form-group">
						<label>Nombre</label> <input class="form-control" name="nombre"
							placeholder="Nombre del usuario" maxlength="50" autocomplete="off" required="required">
					</div>
					<div class="form-group">
						<label>Contraseña</label> <input class="form-control"
							type="password" name="pass" placeholder="Contraseña" autocomplete="off" required="required">
					</div>
					<button type="submit" class="btn btn-default">Dar de alta</button>
					<button type="reset" class="btn btn-default">Limpiar campos</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php include 'footer.php' ?>