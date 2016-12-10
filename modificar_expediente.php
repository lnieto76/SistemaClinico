<?php
require('conexion.php');
if($_POST)
{
	if($actualizar = mysql_query("update expedientes set peso='$_POST[peso]',presion='$_POST[presion]',talla='$_POST[talla]',diagnostico='$_POST[diagnostico]', hora='$_POST[hora]', fecha='$_POST[fecha]',intervenciones='$_POST[intervenciones]', estudios='$_POST[estudios]', observaciones='$_POST[observaciones]',sintomas='$_POST[sintomas]',receta='$_POST[receta]', proxima_Cita='$_POST[cita]' where id_expediente=$_GET[id]"))
	{
		echo "<script>alert('Datos actualizados correctamente');</script>";
	}
	else
	{
		echo "<script>alert('ERROR AL ALMACENAR LOS DATOS favor revisar')</script>".mysql_error();
	}
}
if($_GET['id'])
{
	echo "<br><br>
 <link rel='stylesheet' type='text/css' href='style.css' />
<script type='text/javascript' src='search_ver_medicamentos.js'></script>
<form method=post>
<table border=1px align=center>	
<tr><td align=center colspan=2>Modificar datos de expediente</td></tr>";
echo "<tr><td>Peso</td><td>";
$uno = mysql_fetch_array(mysql_query("select peso from expedientes where id_expediente='$_GET[id]'")); 
echo "<input type=text name=peso size=5 value='$uno[peso]'>Lbs</td></tr>";
echo "<tr><td>Presion</td><td>";
$uno = mysql_fetch_array(mysql_query("select presion from expedientes where id_expediente='$_GET[id]'")); 
echo "<input type=text name=presion size=5 value='$uno[presion]'></td></tr>";
echo "<tr><td>Altura</td><td>";
$uno = mysql_fetch_array(mysql_query("select talla from expedientes where id_expediente='$_GET[id]'")); 
echo "<input type=text name=talla size=5 value='$uno[talla]'>Mts</td></tr>";
echo "<tr><td>Diagnostico</td><td>";
$uno = mysql_fetch_array(mysql_query("select diagnostico from expedientes where id_expediente='$_GET[id]'")); 
echo "<textarea name=diagnostico cols=60 rows=4>$uno[diagnostico]</textarea></td></tr>";
echo "<tr><td>Hora</td><td>";
$uno = mysql_fetch_array(mysql_query("select hora from expedientes where id_expediente='$_GET[id]'")); 
echo "<input type=text name=hora size=10 value='$uno[hora]'></td></tr>";
echo "<tr><td>Fecha</td><td>";
echo "<input type=date name=fecha size=10></td></tr>";
echo "<tr><td>Intervenciones Quirurjicas</td><td>";
$uno = mysql_fetch_array(mysql_query("select intervenciones from expedientes where id_expediente='$_GET[id]'")); 
echo "<input type=text size=60 name=intervenciones size=60 value='$uno[intervenciones]'></td></tr>";
echo "<tr><td>Estudios</td><td>";
$uno = mysql_fetch_array(mysql_query("select estudios from expedientes where id_expediente='$_GET[id]'")); 
echo "<input type=text size=60 name=estudios size=60 value='$uno[estudios]'></td></tr>";
echo "<tr><td>Observaciones</td><td>";
$uno = mysql_fetch_array(mysql_query("select observaciones from expedientes where id_expediente='$_GET[id]'")); 
echo "<textarea name=observaciones cols=60 rows=4>$uno[observaciones]</textarea></td></tr>";
echo "<tr><td>Sintomas</td><td>";
$uno = mysql_fetch_array(mysql_query("select sintomas from expedientes where id_expediente='$_GET[id]'")); 
echo "<input type=text size=60 name=sintomas value='$uno[sintomas]'></td></tr>";
echo "<tr><td>Receta</td><td>";
$uno = mysql_fetch_array(mysql_query("select receta from expedientes where id_expediente='$_GET[id]'")); 
echo "<textarea name=receta cols=60 rows=4>$uno[receta]</textarea></td></tr>";
echo "<tr><td>Proxima Cita</td>"; 
echo "<td><input type=date name=cita size=10></td></tr>";
echo "<tr><td align=center colspan=2><input type=submit value='Realizar cambios'></td></tr>";
echo "</table>
</form>";
}
?>