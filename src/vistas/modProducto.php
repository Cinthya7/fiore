<?php
session_start ();

if (! isset ( $_SESSION ["id_usuario"] ))
	header ( "Location: index.php" );

include 'header.php';
include '../utils/conexion.php';
$id_producto = $_GET ["id_producto"];

$result = $conn->query ( "SELECT ID_PRODUCTOP,ID_PRODUCTOF,DESCRIPCION,CANTIDAD,PRECIO_UNIT FROM PRODUCTOS WHERE ID_PRODUCTO = $id_producto" );

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
	<div class="panel-heading">Modificar producto</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form role="form" action="../scripts/actualizacionProducto.php"
					method="POST">
					<div class="form-group">
						<label>ID Proveedor</label> <input class="form-control"
							name="id_productop"
							placeholder="ID usado por el proveedor del producto"
							maxlength="11" autocomplete="off" autofocus="autofocus"
							type="number" value="<?= $row["ID_PRODUCTOP"]; ?>">
					</div>
					<div class="form-group">
						<label>ID Fiore e Dulci</label> <input class="form-control"
							name="id_productof" placeholder="ID usuario por Fiore e Dulci"
							maxlength="4" autocomplete="off"
							value="<?= $row["ID_PRODUCTOF"]; ?>">
					</div>
					<div class="form-group">
						<label>Descripcion</label> <input class="form-control"
							name="descripcion" placeholder="Descripción del producto"
							maxlength="100" autocomplete="off" required="required"
							value="<?= $row["DESCRIPCION"]; ?>">
					</div>
					<div class="form-group">
						<label>Cantidad</label> <input class="form-control"
							name="cantidad" placeholder="Cantidad en el inventario"
							maxlength="11" autocomplete="off" required="required"
							type="number" value="<?= $row["CANTIDAD"]; ?>">
					</div>
					<div class="form-group">

						<label>Precio unitario</label>
						<div class="form-group input-group">
							<span class="input-group-addon">$</span> <input
								class="form-control" name="precio_unit"
								placeholder="Costo de cada pieza" maxlength="11"
								autocomplete="off" required="required"
								value="<?= $row["PRECIO_UNIT"]; ?>">
						</div>
					</div>

					<input type="text" name="id_producto" value="<?= $id_producto; ?>" style="visibility: hidden;">
					<button type="submit" class="btn btn-default">Actualizar</button>
					<button type="reset" class="btn btn-default">Restaurar campos</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php' ?>