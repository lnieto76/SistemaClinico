<?php
if($_GET['id'])
{
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = "usbw"; 
$bd_base = "doctora"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con);
echo "
<style>
td
{
	text-align:center;
}
</style>
";
session_start();
if(isset($_SESSION["Administrador"]))
{
	if($mostrar=mysql_fetch_array(mysql_query("select * from usuarios where usuario='$_SESSION[Administrador]'")))
	{
		//echo "Ha iniciado sesion como:<font color=red> $mostrar[nombre] </font>con permisos de Administrador ";
		//echo "$_SESSION[Administrador]<br>";
	}
}
elseif(isset($_SESSION["Usuario"]))
{
	if($mostrar=mysql_fetch_array(mysql_query("select * from usuarios where usuario='$_SESSION[Usuario]'")))
	{
		//echo "Ha iniciado sesion como:<font color=red> $mostrar[nombre] </font>con permisos de: Usuario Limitado </font>";
		//echo "$_SESSION[Usuario]<br>";
	}
}
else
{
	echo "<script>alert('No tiene permisos para ver el sistema será REDIRECCIONADO al inicio de sesion');history.go(-1);</script>";
}
$quebrar = explode ("*", $_GET['id']);
$fecha= $quebrar[0];
$fecha2=$quebrar[1];
//echo $fecha . $fecha2;

if($verdatos = mysql_query("select paciente.nombre_completo, paciente.id_paciente,citas.id_citas ,citas.id_paciente, citas.hora, citas.fecha, citas.motivo_cita from paciente,citas where paciente.id_paciente=citas.id_paciente AND citas.fecha BETWEEN '$fecha' AND '$fecha2' order by hora DESC "))
	{
	echo "<br>
	<body onLoad=\"Javascript:window.print();\">
	<table border=1px align=center>
	<tr><td colspan=6 align=center>Citas Registradas entre: <font color=red>$fecha y $fecha2</font></td></tr>
	<tr><td>Paciente</td><td>Hora</td><td>Fecha</td><td>Motivo</td></tr>";
	while($ver=mysql_fetch_array($verdatos))
	{
		echo "<tr><td>".$ver['nombre_completo']."</td>";
		echo "<td>".$ver['hora']."</td>";
		echo "<td>".$ver['fecha']."</td>";
		echo "<td>".$ver['motivo_cita']."</td></tr>";
	}
	echo "</table><br>";
	}
}
?>