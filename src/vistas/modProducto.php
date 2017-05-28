<?php
	session_start();
	
	if(!isset($_SESSION["id_usuario"]))
		header("Location: index.php");

	include 'header.php';
	include '../utils/conexion.php';
	$id_producto = $_GET["id_producto"];
	
	$result = $conn->query("SELECT ID_PRODUCTOP,ID_PRODUCTOF,DESCRIPCION,CANTIDAD,PRECIO_UNIT FROM PRODUCTOS WHERE ID_PRODUCTO = $id_producto");
	
	if(!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	} else {
		$row = $result->fetch_assoc();
	}
?>

<div align="left"><h3>Modificar Producto</h3></div>

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
			<form action="../scripts/actualizacionProducto.php" method="POST">
			
				<table border="0" align="center" style="margin-top: 5%">
					<tr style="visibility: hidden;">
						<td>ID PRODUCTO</td>
						<td><input type="text" name="id_producto" value="<?= $id_producto; ?>"/></td>
					</tr>
					<tr>
						<td>ID PROVEEDOR</td>
						<td><input type="text" name="id_productop" value="<?= $row["ID_PRODUCTOP"]; ?>"/></td>
					</tr>
					<tr>
						<td>ID FIORE E D</td>
						<td><input type="text" name="id_productof" value="<?= $row["ID_PRODUCTOF"]; ?>"/></td>
					</tr>
					<tr>
						<td>DESCRIPCION</td>
						<td><input type="text" name="descripcion" value="<?= $row["DESCRIPCION"]; ?>"/></td>
					</tr>
					<tr>
						<td>CANTIDAD</td>
						<td><input type="text" name="cantidad" value="<?= $row["CANTIDAD"]; ?>"/></td>
					</tr>
					<tr>
						<td>PRECIO UNITARIO</td>
						<td><input type="text" name="precio_unit" value="<?= $row["PRECIO_UNIT"]; ?>"/></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit"/>
							<input type="reset" />
						</td>
					</tr>
				
				</table>
			
			</form>
	</tr>
</table>

</body>
</html>