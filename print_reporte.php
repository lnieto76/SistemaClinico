<?php
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
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
	echo "<script>alert('No tiene permisos para ver el sistema será REDIRECCIONADO al inicio de sesion');location.replace('index.php')</script>";
}
if($_GET['id'])
{
	if($id = mysql_fetch_array(mysql_query("select nombre_completo from paciente where id_paciente='$_GET[id]'")))
	{
	echo "
	<body onLoad=\"Javascript:window.print();\">
	<table border=1px align=center>
	<tr><td colspan=2 align=center>Expediente Medico</td></tr>
	<tr><td>Nombre</td><td>";
	$uno = mysql_fetch_array(mysql_query("select nombre_completo from paciente where id_paciente='$_GET[id]'")); echo "$uno[nombre_completo]";
	echo "</td></tr>
	<tr><td>Foto</td><td align=center>"; $uno = mysql_fetch_array(mysql_query("select foto from paciente where id_paciente='$_GET[id]'")); echo "<img src=\"data:image/jpg;base64,".base64_encode($uno["foto"])."\" width=200 height=150></td></tr>";
	echo "<tr><td>Peso</td><td>";
	$uno = mysql_fetch_array(mysql_query("select peso from paciente where id_paciente='$_GET[id]'")); echo "$uno[peso]";
	echo " Lbs</td></tr>";
	echo "<tr><td>Presion</td><td>";
	$uno = mysql_fetch_array(mysql_query("select presion from paciente where id_paciente='$_GET[id]'")); echo "$uno[presion]";
	echo "</td></tr>";
	echo "<tr><td>Altura</td><td>";
	$uno = mysql_fetch_array(mysql_query("select talla from paciente where id_paciente='$_GET[id]'")); echo "$uno[talla]";
	echo " Mts</td></tr>";
	echo "<tr><td>Tipo de Sangre</td><td>";
	$uno = mysql_fetch_array(mysql_query("select tipo_sangre from paciente where id_paciente='$_GET[id]'")); echo "$uno[tipo_sangre]";
	echo "</td></tr></table>";
}
echo "
<center><h3>..::Expediente Clinico::..</h3></center>

	<table align=center border=1px>
	<tr>
		<td>Peso</td>
		<td>Presion</td>
		<td>Altura</td>
		<td>Diagnostico</td>
		<td>Hora</td>
		<td>Fecha</td>
		<td>Intervenciones</td>
		<td>Estudios</td>
		<td>Observaciones</td>
		<td>Sintomas</td>
		<td>Receta</td>
		<td>Proxima Cita</td>
	</tr>";
	if($med = mysql_query("select id_paciente,peso,presion,talla,id_expediente,diagnostico,hora,fecha,intervenciones,estudios,observaciones,sintomas,receta,proxima_Cita from expedientes where id_paciente='$_GET[id]'"))
	{
		while($mostrar = mysql_fetch_array($med))
		{
			echo "<tr><td>".$mostrar['peso']."</td>";
			echo "<td>".$mostrar['presion']."</td>";
			echo "<td>".$mostrar['talla']."</td>";
			echo "<td><textarea readonly=readonly>".$mostrar['diagnostico']."</textarea></td>";
			echo "<td>".$mostrar['hora']."</td>";			
			
			$fechaa = explode ('-',$mostrar['fecha']);
			$ano= $fechaa[0];
			$mes = $fechaa[1];
			$dia = $fechaa[2];
			$sep = "/";
			$fecha_completa = $dia.$sep.$mes.$sep.$ano;
			echo "<td>".$fecha_completa."</td>";
			
			echo "<td>".$mostrar['intervenciones']."</td>";
			echo "<td>".$mostrar['estudios']."</td>";
			echo "<td><textarea readonly=readonly>".$mostrar['observaciones']."</textarea></td>";
			echo "<td>".$mostrar['sintomas']."</td>";
			echo "<td>".$mostrar['receta']."</td>";
			
			$fechaa = explode ('-',$mostrar['proxima_Cita']);
			$ano1= $fechaa[0];
			$mes1 = $fechaa[1];
			$dia1 = $fechaa[2];
			$fecha_completaa = $dia1.$sep.$mes1.$sep.$ano1;
			echo "<td>".$fecha_completaa."</td></tr>";
		}
		echo "</table>";
	}
}
?>