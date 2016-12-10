<?php
require('conexion.php');
?>
 <link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="consulta_ver_expediente.js"></script>
 <form method=post>
 <h2>Busquedas de Expedientes</h2>
	<table align=center>
	<tr><td>Digite el apellido o nombre del paciente:</td><td>
	<font color="#FFFFFF"><input type=hidden name='id_Paciente' id='id'><input type='text' name="nombre" id='input' onKeyUp="javascript:autocompletar('lista',this.value);"  />
	<span id='reloj'><img src='image.gif' border=0 /></span>
	<!--div que mostrara la lista de coincidencias -->
	<div id='lista'></div></td></tr>
	<tr><td><input type=submit value='Realizar Busqueda'></td></tr>
	</table>
 </form>
<?php
if($_POST)
{
	if($id = mysql_fetch_array(mysql_query("select nombre_completo from paciente where id_paciente='$_POST[id_Paciente]'")))
	{
	echo "
	<table border=1px align=center>
	<tr><td colspan=2 align=center>Expedientes</td></tr>
	<tr><td>Nombre</td><td>";
	$uno = mysql_fetch_array(mysql_query("select nombre_completo from paciente where id_paciente='$_POST[id_Paciente]'")); echo "$uno[nombre_completo]";
	echo "</td></tr>
	<tr><td>Foto</td><td align=center>"; $uno = mysql_fetch_array(mysql_query("select foto from paciente where id_paciente='$_POST[id_Paciente]'")); echo "<img src=\"data:image/jpg;base64,".base64_encode($uno["foto"])."\" width=200 height=150></td></tr>";
	echo "<tr><td>Peso</td><td>";
	$uno = mysql_fetch_array(mysql_query("select peso from paciente where id_paciente='$_POST[id_Paciente]'")); echo "$uno[peso]";
	echo "</td></tr>";
	echo "<tr><td>Presion</td><td>";
	$uno = mysql_fetch_array(mysql_query("select presion from paciente where id_paciente='$_POST[id_Paciente]'")); echo "$uno[presion]";
	echo "</td></tr>";
	echo "<tr><td>Altura</td><td>";
	$uno = mysql_fetch_array(mysql_query("select talla from paciente where id_paciente='$_POST[id_Paciente]'")); echo "$uno[talla]";
	echo "</td></tr>";
	echo "<tr><td>Tipo de Sangre</td><td>";
	$uno = mysql_fetch_array(mysql_query("select tipo_sangre from paciente where id_paciente='$_POST[id_Paciente]'")); echo "$uno[tipo_sangre]";
	echo "</td></tr></table>";
}
echo "
<center><h3>..::Expediente Clinico::..</h3></center>
	<style>
	td
	{
		text-align=center;
	}
	</style>
	<table align=center border=1px>
	<tr>
		<td>ID</td>
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
		<td>Modificar</td>
	</tr>";
	if($med = mysql_query("select id_paciente,peso,presion,talla,id_expediente,diagnostico,hora,fecha,intervenciones,estudios,observaciones,sintomas,receta,proxima_Cita from expedientes where expedientes.id_paciente='$_POST[id_Paciente]'"))
	{
		while($mostrar = mysql_fetch_array($med))
		{
			echo "<tr><td>".$mostrar['id_paciente']."</td>";
			echo "<td>".$mostrar['peso']."</td>";
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
			echo "<td>".$fecha_completaa."</td>";
			
			echo "<td><a href='modificar_expediente.php?id=$mostrar[id_expediente]'>Modificar entrada</a></td></tr>";
		}
	}
	echo "</table>
	";
}
?>