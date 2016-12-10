<?php
require('conexion.php');

if($user=mysql_query("select * from usuarios order by tipo"))
{
	echo "
	<table border=1px align=center>
	<tr><td colspan=5 align=center>Usuarios Registrados</td></tr>
	<tr><td>Usuario</td><td>nombre</td><td>Tipo</td><td>Modificar</td><td>Eliminar</td></tr>";
	while($ver=mysql_fetch_array($user))
	{
		echo "<tr><td>".$ver['usuario']."</td>";
		echo "<td>".$ver['nombre']."</td>";
		echo "<td>".$ver['tipo']."</td>";
		echo "<td><a href='m_usuarios.php?id=$ver[id]' alt='Modificar Usuario'>Modificar Usuario</a></td>";
		echo "<td><a href='confirmar.php?id=$ver[id]' alt='Eliminar usuario $ver[nombre]'>Eliminar Usuario</a></td>";
	}
}
?>
