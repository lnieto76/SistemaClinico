<?php
require('conexion.php');
$date =@date("Y/m/d");
$fecha=@$_POST['fecha'];
$fecha2=@$_POST['fecha2'];
echo "
	<h3>..::Busqueda por fechas::..</h3>
	<form method=post>
	<table border=1px align=center>
	<tr><td colspan=2 align=center>Busqueda por fecha</td></tr>
	<td>Fecha 1:<input type=date name=fecha></td><td>Fecha 2:<input type=date name=fecha2></td></tr>
	<tr><td colspan=2 align=center><input type=submit value='Realizar Busqueda'></td></tr>
	</table></form><br><br>
	";
if($_POST)
{
	if($verdatos = mysql_query("select paciente.nombre_completo, paciente.id_paciente,citas.id_citas ,citas.id_paciente, citas.hora, citas.fecha, citas.motivo_cita from paciente,citas where paciente.id_paciente=citas.id_paciente AND citas.fecha BETWEEN '$fecha' AND '$fecha2' order by hora DESC "))
	{
	echo "<br>
	<table border=1px align=center>
	<tr><td colspan=6 align=center>Citas Registradas entre: <font color=red>$fecha y $fecha2</font></td></tr>
	<tr><td>Paciente</td><td>Hora</td><td>Fecha</td><td>Motivo</td><td>Modificar</td><td>Eliminar</td></tr>";
	while($ver=mysql_fetch_array($verdatos))
	{
		echo "<tr><td>".$ver['nombre_completo']."</td>";
		echo "<td>".$ver['hora']."</td>";
		echo "<td>".$ver['fecha']."</td>";
		echo "<td>".$ver['motivo_cita']."</td>";
		echo "<td><a href='m_citas.php?id=$ver[id_citas]' alt='Modificar Cita'>Modificar Cita</a></td>";
		echo "<td><a href='e_citas.php?id=$ver[id_citas]' alt='Eliminar Cita'>Eliminar Cita</a></td>";
	}
	echo "</table><br>";
	}	
	echo "Imprimir --><input type=submit style=\"background-image:url(print.png); background-color:#000000;\" value='         ' onClick=\"window.open('print_citas2.php?id=$fecha*$fecha2','','toolbar=0,location=0,directories=0,status=0,scrollbars=1,resizable=0,copyhistory=0,menuBar=0,width=500,height=1000')\" target='_self'>";
	//echo "<a href='print_citas2.php?id=$fecha*$fecha2'>print...</a>";
}
?>