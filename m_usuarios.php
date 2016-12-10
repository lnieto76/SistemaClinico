<?php
require('conexion.php');
if($_POST)
{
	if($update= mysql_query("update usuarios set usuario='$_POST[usuario]', contrasena=md5('$_POST[contrasena]'), nombre='$_POST[nombre]', tipo='$_POST[tipo]' where id='$_GET[id]'"))
	{
		echo "<script>alert('Datos modificados correctamente');</script>";
	}
	else
	{
		echo "<script>alert('Error en los datos favor verificar');</script>".mysql_error();
	}
}
if($_GET['id'])
{
	echo "<form method=post><table border=1px align=center>
	<tr><colspan=2 align=center>Modificar datos de usuario</td></tr>
	";
echo "<tr><td>Usuario</td><td>";$uno = mysql_fetch_array(mysql_query("select usuario from usuarios where id='$_GET[id]'")); echo "<input type=text name=usuario value='$uno[usuario]'></td></tr>";
echo "<tr><td>Contraseña</td><td>";$uno = mysql_fetch_array(mysql_query("select contrasena from usuarios where id='$_GET[id]'")); echo "<input type=password name=contrasena value='$uno[contrasena]'></td></tr>";
echo "<tr><td>Nombre Completo</td><td>";$uno = mysql_fetch_array(mysql_query("select nombre from usuarios where id='$_GET[id]'")); echo "<input type=text name=nombre value='$uno[nombre]'></td></tr>";
echo "<tr><td>Tipo</td><td>";$uno = mysql_fetch_array(mysql_query("select tipo from usuarios where id='$_GET[id]'")); echo "$uno[tipo] <br><select name='tipo'><option value=Administrador>Administrador</option><option value='Usuario'>Usuario Limitado</option></select></td></tr>";
echo "<tr><td colspan=2 align=center><input type=submit value='Modificar Usuario'></td></tr></table></form>";
}
?>