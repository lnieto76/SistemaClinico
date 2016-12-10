<?php
require('conexion.php');
$hora =@date("h:i:s:a");
$date =@date("Y/m/d");
if($_POST)
{
	if($cita=mysql_query("insert into citas(id_paciente, hora, fecha,motivo_cita) values('$_POST[id]','$_POST[hora]','$_POST[fecha]','$_POST[motivo_cita]')"))
	{
		echo "<script>alert('Cita a las $_POST[hora] registrada con exito');</script>";
	}
	else
	{
		echo mysql_error();
	}
}
?>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="consulta_ver_expediente.js"></script>
<h3>..::Registro de citas::..</h3>
<form method=post>
<table border=1px align=center>
<tr><td align=center colspan=2>Citas</td></tr>
<tr><td>Paciente</td>
<td><input type=hidden name=id id=id>
<input type='text' name="nombre" id='input' onKeyUp="javascript:autocompletar('lista',this.value);"  />
	<span id='reloj'><img src='image.gif' border=0 /></span>
	<!--div que mostrara la lista de coincidencias -->
	<div id='lista'></div></td></tr>
<tr><td>Hora</td><td><input type=text name=hora></td><tr>
<tr><td>Fecha</td><td><input type=date name=fecha></td><tr>
<tr><td>Motivo</td><td><input type=text name=motivo_cita size=80></td><tr>
<tr><td colspan=2 align=center><input type=submit value='Registrar cita'></td></tr>
</table>
</form>