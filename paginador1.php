<?php

require('conexion.php');

$fecha = trim(@$_POST["fecha"]);
$hoy = @date("Y/m/d");
?>
<script type="text/javascript" src="pag1.js"></script>
<style>
a{
text-decoration:underline;
cursor:pointer;
}
</style>
	<form method=post action=<?php echo $_SERVER["PHP_SELF"];?>><br>
	<table align=center>
	<tr>
		<td>Busqueda de pacientes por fecha:</td>
	</tr>
	<tr>
		<td>Digite la primera fecha:</td>
	</tr>
	<tr>
		<td><input type="text" name="fecha1" maxlength="10" size="10" value="<?php echo $hoy;?>"></td>
		</tr>
	<tr>
		<td>Digite la segunda fecha:</td>
	</tr>
	<tr>
		<td><input type="text" name="fecha2" maxlength="10" size="10" value="<?php echo $hoy;?>"></td>
		</tr>
		
	<tr>
	<td>
	<input type=submit name=buscar value='Realizar Busqueda'>
	</td>
	</tr>
	</table></form>

<?php
if(isset($_POST['buscar']))
{
echo "<div id=Contenido align=center>";
require('pag1.php');
echo "</div>";
}
?>
</body>