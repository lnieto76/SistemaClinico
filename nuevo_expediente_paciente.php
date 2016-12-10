<?php
require('conexion.php');
$hora =@date("h:i:s:a");

if($_POST)
	{
	if($guardar=mysql_query("INSERT INTO expedientes (id_paciente,peso,presion,talla,diagnostico,hora,fecha,intervenciones,estudios,observaciones,sintomas,receta,proxima_cita) values('$_GET[id]','$_POST[peso]','$_POST[presion]','$_POST[talla]','$_POST[diagnostico]','$_POST[hora]','$$_POST[fecha]','$_POST[intervenciones]','$_POST[estudios]','$_POST[observaciones]','$_POST[sintomas]','$_POST[receta]','$$_POST[cita]')"))
	{
		echo "<script>alert('Expediente registrado con exito')</script>";
		if($proxima_cita=mysql_query("insert into citas (id_paciente,hora,fecha,motivo_cita) values('$_GET[id]','$_POST[hora]','$$_POST[cita]','$_POST[motivo]')"))
		{
			echo "<script>alert('Cita registrada con exito para fecha: $$_POST[cita]')</script>";
		}
		else
		{
			echo "No se pudo guardar los datos de la cita en el expediente intente nuevamente (Error 11)".mysql_error();
		}
	}
	else
	{
		echo "No se pudo guardar los datos del expediente intente nuevamente (Error 10)".mysql_error();
	}
	}
if($_GET['id'])
{
echo "
	<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />
<script type=\"text/javascript\" src=\"search_ver_medicamentos.js\"></script>

	<form method=post>
	<h2>Crear Expediente</h2><br><br>
	<table align=center border='1px'>
	<tr><td align=center colspan=2>Registrar en Expediente</td></tr>
	<tr><td>Nombre Completo</td>";	
	$uno = mysql_fetch_array(mysql_query("select nombre_completo from paciente where id_paciente='$_GET[id]'")); 
	echo "<td align=center>$uno[nombre_completo]</td>";
	echo "	
	</tr>
	<tr><td>Peso</td><td><input type=text name=peso>Lbs</td></tr>
	<td>Presion</td><td><input type=text name=presion></td></tr>
	<tr><td>Altura</td><td><input type=text name=talla>Mts</td></tr>
	<tr><td>* Diagnostico</td><td><textarea cols=100 rows=4 maxlength=500 name=diagnostico></textarea></td></tr>
	<tr><td>* Hora</td><td><input type=text name=hora maxlength=11 value=$hora></td></tr>
	<tr><td>* Fecha Actual</td>	
	<td><input type=date name=fecha></td></tr>
	<tr><td>Intervenciones Qirurgicas</td><td><input type=text name=intervenciones size=100 maxlength=200></td></tr>
	<tr><td>Estudios Medicos</td><td><input type=text name=estudios size=100 maxlength=200></td></tr>
	<tr><td>* Observaciones</td><td><textarea name=observaciones cols=60 rows=4 maxlength=200></textarea></td></tr>
	<tr><td>* Sintomas</td><td><textarea name=sintomas cols=100 rows=4 maxlength=200></textarea></td></tr>
	<tr><td>Receta</td><td><textarea name=receta cols=100 rows=4></textarea></td></tr>
	
	<tr><td>Proxima Cita</td>
	<td><input type=date name=cita></td></tr>
	<tr><td>Motivo Cita</td><td><textarea name='motivo' cols=60 rows=4></textarea></td></tr>
	<tr><td align=center colspan=2><input type=submit value='Registrar en el expediente'></td></tr>
	</table>
	</form>
	";
	}
?>
