<?php
	include 'header.php';
?>

	<h1 align="center" style="color: red">USUARIO INCORRECTO</h1>
	<form action="../scripts/login.php" method="POST">
	
		<table border="0" align="center" style="margin-top: 5%">
		
			<tr>
				<td>Usuario</td>
				<td><input type="text" name="usuario"/></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="password" name="pass"/></td>
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