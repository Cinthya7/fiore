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
	<div class="panel-heading">Nuevo Producto</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				<form role="form" action="../scripts/registroProducto.php"
					method="POST">
					<div class="form-group">
						<label>ID Proveedor</label> <input class="form-control"
							name="id_productop"
							placeholder="ID usado por el proveedor del producto"
							maxlength="11" autocomplete="off" autofocus="autofocus" type="number">
					</div>
					<div class="form-group">
						<label>ID Fiore e Dulci</label> <input class="form-control"
							name="id_productof" placeholder="ID usuario por Fiore e Dulci"
							maxlength="4" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Descripcion</label> <input class="form-control"
							name="descripcion" placeholder="Descripción del producto"
							maxlength="100" autocomplete="off" required="required">
					</div>
					<div class="form-group">
						<label>Cantidad</label> <input class="form-control"
							name="cantidad" placeholder="Cantidad en el inventario"
							maxlength="11" autocomplete="off" required="required" type="number">
					</div>
					<div class="form-group">
					
						<label>Precio unitario</label>
						<div class="form-group input-group">
							<span class="input-group-addon">$</span> 
							<input class="form-control"
								name="precio_unit" placeholder="Costo de cada pieza"
								maxlength="11" autocomplete="off" required="required">
						</div>
					</div>


					<button type="submit" class="btn btn-default">Dar de alta</button>
					<button type="reset" class="btn btn-default">Limpiar campos</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php' ?>