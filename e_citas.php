<?php
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = "root"; 
$bd_base = "doctora"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con);

session_start();
if(isset($_SESSION["Administrador"]))
{
	if($mostrar=mysql_fetch_array(mysql_query("select * from usuarios where usuario='$_SESSION[Administrador]'")))
	{
		echo "Ha iniciado sesion como:<font color=red> $mostrar[nombre] </font>con permisos de Administrador ";
		echo "<font color=red>Usuario: $_SESSION[Administrador]</font><br>";
	}
}
else
{
	echo "<script>alert('No tiene permisos para ver el sistema será REDIRECCIONADO al inicio de sesion');location.replace('index.php')</script>";
}	
if($_GET['id'])
{
	$data = explode(".", $_GET['id']);
	{
		$id= $data[0];
		$id_pac = $data[1];
		$fecha = $data[2];
	}
	/*if($modificar_proxima_cita = mysql_query("update expedientes set proxima_Cita='' WHERE id_paciente='$id_pac' and proxima_Cita='$fecha'"))
		{
			echo "<script>alert('Datos de cita modificados en expediente correctamente');</script>";
		}
		else
		{
			echo "<script>alert('Error el intentar modificar datos en el expediente (ERROR 16)');</script>".mysql_error();
		}*/
	if($eliminar = mysql_query("delete from citas where id_citas='$id'"))
	{
		echo "<script>alert('Cita eliminada con exito');location.replace('r_citas.php');</script>";
	}
	else
	{
		echo "<script>alert('Error al intentar eliminar cita (ERROR 17)');</script>".mysql_error();
	}
}
?>