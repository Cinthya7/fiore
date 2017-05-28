<?php
	include 'header.php';
?>

	<label>Iniciar sesiÃ³n</label>
	<form action="<?=$SCRIPT_LOGIN ?>" method="POST">
	
		<table border="0" align="center" style="margin-top: 5%">
		
			<tr>
				<td>Usuario</td>
				<td><input type="text" name="usuario"/></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="password" name="password"/></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
					<input type="submit"/>
				</td>
			</tr>
		
		</table>
	
	</form>

</body>
</html>