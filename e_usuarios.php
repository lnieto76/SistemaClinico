<?php
require('conexion.php');
if($_GET['id'])
{
	if($eliminar = mysql_query("delete from usuarios where id='$_GET[id]'"))
	{
		echo "<script>alert('Usuario eliminado con exito');location.replace('modificar_usuarios.php');</script>";
	}
	else
	{
		echo mysql_error();
	}
}
echo $_GET['id'];
?>