<?php
require('conexion.php');
$date =$date =date("Y/m/d");
echo "
	<form method=post>
	<table align=center>
	<tr><td colspan=2>Busqueda de citas</td></tr>
	<tr><td>Digite la primera fecha</td><td><input type=text name=fecha1></td></tr>
	<tr><td>Digite la segunda fecha</td><td><input type=text name=fecha2></td></tr>	
	<tr><td colspan=2><input type=submit value=Realizar busqueda></td></tr>
	</table>
	</form>";
	
if($_POST)
{
	$fechauno = explode ('/',$_POST['fecha1']);
			$dia= $fechauno[0];
			$mes = $fechauno[1];
			$ano = $fechauno[2];
			$sep="-";
			$fecha_completa = $ano.$sep.$mes.$sep.$dia;
			
	$fechados = explode ('/',$_POST['fecha2']);
			$dia2= $fechados[0];
			$mes2 = $fechados[1];
			$ano2 = $fechados[2];
			$fecha_completa2 = $ano2.$sep.$mes2.$sep.$dia2;
			
	if($user=mysql_query("select paciente.nombre_completo, paciente.id_paciente,citas.id_citas ,citas.id_paciente, citas.hora, citas.fecha, citas.motivo_cita from paciente,citas where citas.fecha BETWEEN '$fecha_completa' AND '$fecha_completa2' AND paciente.id_paciente=citas.id_paciente order by hora DESC"))
	{
	echo "<br><br>
	<table border=1px align=center>
	<tr><td colspan=6 align=center>Citas Registradas de dia de hoy: <font color=red>$date</font></td></tr>
	<tr><td>Paciente</td><td>Hora</td><td>Fecha</td><td>Motivo</td><td>Modificar</td><td>Eliminar</td></tr>";
	while($ver=mysql_fetch_array($user))
	{
		echo "<tr><td>".$ver['nombre_completo']."</td>";
		echo "<td>".$ver['hora']."</td>";
		echo "<td>".$ver['fecha']."</td>";
		echo "<td>".$ver['motivo_cita']."</td>";
		echo "<td><a href='m_citas.php?id=$ver[id_citas].$ver[id_paciente]' alt='Modificar Cita'>Modificar Cita</a></td>";
		echo "<td><a href='e_citas.php?id=$ver[id_citas].$ver[id_paciente].$ver[fecha]' alt='Eliminar Cita'>Eliminar Cita</a></td>";
	}
}
}
?>