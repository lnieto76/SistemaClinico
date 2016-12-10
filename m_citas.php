<?php
require('conexion.php');
if($_GET['id'])
{
	$data = explode(".", $_GET['id']);
	{
		$id= $data[0];
		$id_pac = @$data[1];
	}
	echo "<form method=post><table border=1px align=center>
	<tr><td colspan=2 align=center>Modificar datos de CITA</td></tr>
	";
echo "<tr><td>Paciente</td><td>";$uno = mysql_fetch_array(mysql_query("select paciente.nombre_completo, citas.id_citas, citas.id_paciente from citas,paciente where id_citas='$id' AND paciente.id_paciente=citas.id_paciente")); echo "$uno[nombre_completo]</td></tr>";
echo "<tr><td>Hora</td><td>";$uno = mysql_fetch_array(mysql_query("select hora from citas where id_citas='$id'")); echo "<input type=text name=hora value='$uno[hora]'></td></tr>";
echo "<tr><td>Fecha</td><td>";$uno = mysql_fetch_array(mysql_query("select fecha from citas where id_citas='$id'")); echo "<input type=text name=fecha value='$uno[fecha]'></td></tr>";
echo "<tr><td>Motivo</td><td>";$uno = mysql_fetch_array(mysql_query("select motivo_cita from citas where id_citas='$id'")); echo "<input type=text name=motivo_cita value='$uno[motivo_cita]'></td></tr>";
echo "<tr><td colspan=2 align=center><input type=submit value='Registrar cambio'></td></tr></table></form>";

if($_POST)
{
$fechaa="$_POST[fecha]";
$dos = mysql_fetch_array(mysql_query("select fecha from citas where id_citas='$id'"));
		if($modificar_proxima_cita = mysql_query("update expedientes set proxima_Cita='$fechaa' WHERE id_paciente='$id_pac' and proxima_Cita='$dos[fecha]'"))
		{
			echo "<script>alert('Datos de cita modificados en expediente correctamente');</script>";
		}
		else
		{
			echo "<script>alert('error el intentar modificar datos en el expediente (ERROR 14)');</script>".mysql_error();
		}
	if($update= mysql_query("update citas set hora='$_POST[hora]', fecha='$fechaa', motivo_cita='$_POST[motivo_cita]' where id_citas='$id'"))
	{
		echo "<script>alert('Datos de cita modificados correctamente');</script>";
	}
	else
	{
		echo "<script>alert('Error en los datos favor verificar (ERROR 15)');</script>".mysql_error();
	}
}
}
?>