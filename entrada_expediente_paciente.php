<?php
require('conexion.php');
$hora =date("h:i:s:a");
$date =$date =date("Y/m/d");
if($_GET['id'])
{
echo "
	<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />
<script type=\"text/javascript\" src=\"search_ver_medicamentos.js\"></script>

	<form method=post>
	<h2>Nueva entrada en Expediente</h2><br><br>
	<table align=center border='1px'>
	<tr><td align=center colspan=2>Registrar en Expediente</td></tr>
	<tr><td>Nombre Completo</td>";	
	$uno = mysql_fetch_array(mysql_query("select nombre_completo from paciente where id_paciente='$_GET[id]'")); 
	echo "<td align=center>$uno[nombre_completo]</td>";
	echo "	
	</tr>
	<tr><td>Peso</td><td><input type=text name=peso></td></tr>
	<td>Presion</td><td><input type=text name=presion></td></tr>
	<tr><td>Altura</td><td><input type=text name=talla></td></tr>
	<tr><td>* Diagnostico</td><td><textarea cols=60 rows=4 maxlength=500 name=diagnostico></textarea></td></tr>
	<tr><td>* Hora</td><td><input type=text name=hora maxlength=11>hora actual $hora</td></tr>
	<tr><td>* Fecha</td><td><input type=text name=fecha maxlength=10>formato de fecha: $date</td></tr>
	<tr><td>Intervenciones Qirurgicas</td><td><input type=text name=intervenciones size=90 maxlength=200></td></tr>
	<tr><td>Estudios Medicos</td><td><input type=text name=estudios size=90 maxlength=200></td></tr>
	<tr><td>* Observaciones</td><td><textarea name=observaciones cols=60 rows=4 maxlength=200></textarea></td></tr>
	<tr><td>* Sintomas</td><td><input type=text name=sintomas maxlength=200 size=90></td></tr>
	<tr><td>Receta</td><td><input type=text name=receta></td></tr>
	<tr><td>Proxima Cita</td><td><input type=text name=proxima_cita maxlength=10></td></tr>
	<tr><td align=center colspan=2><input type=submit value='Registrar en el expediente'></td></tr>
	</table>
	</form>
	";

	if($_POST)
	{
	if($guardar=mysql_query("INSERT INTO expedientes (id_paciente,peso,presion,talla,diagnostico,hora,fecha,intervenciones,estudios,observaciones,sintomas,receta,proxima_cita) values('$_GET[id]','$_POST[peso]','$_POST[presion]','$_POST[talla]','$_POST[diagnostico]','$_POST[hora]','$_POST[fecha]','$_POST[intervenciones]','$_POST[estudios]','$_POST[observaciones]','$_POST[sintomas]','$_POST[receta]','$_POST[proxima_cita]')"))
	{
		echo "<script>alert('Expediente de $uno[nombre_completo] registrado con exito')</script>";
	}
	else
	{
		echo mysql_error();
	}
	}
	
	echo @$_POST['id_medicamento'];
}
?>