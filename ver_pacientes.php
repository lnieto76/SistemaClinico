 <?php
 require('conexion.php');
 ?>
 <link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="consulta_ver_expediente.js"></script>
 <form method=post>
 <h2>Busquedas de Pacientes</h2>
	<table align=center>
	<tr><td>Digite el apellido o nombre del paciente:</td><td>
	<font color="#FFFFFF"><input type=hidden id='id' name='nombre'><input type='text' name="nombres" id='input' onKeyUp="javascript:autocompletar('lista',this.value);"  />
	<span id='reloj'><img src='image.gif' border=0 /></span>
	<!--div que mostrara la lista de coincidencias -->
	<div id='lista'></div></td></tr>
	<tr><td>Ingrese DUI o NIT del paciente</td><td><input type=text name=id maxlength=17></td></tr>
	<tr><td><input type=submit value='Realizar Busqueda'></td></tr>
	</table>
 </form>
 
<?php
 if($_POST)
 {
	if($id = mysql_fetch_array(mysql_query("select * from paciente where id_paciente='$_POST[nombre]' or dui='$_POST[id]' or nit='$_POST[id]'")))
	{
		echo "
		<table align=center border=1 color=white>
		<tr><td align=center colspan=2>Paciente</td></tr>
		<tr><td>* Nombre Completo</td><td>"; $uno = mysql_fetch_array(mysql_query("select nombre_completo from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[nombre_completo]";
		echo "
		</td></tr>
		<tr><td>* Foto</td><td align=center>"; $uno = mysql_fetch_array(mysql_query("select foto from paciente where id_paciente='$_POST[nombre]'")); echo "<img src=\"data:image/jpg;base64,".base64_encode($uno["foto"])."\" width=200 height=150>";
		echo "
		</td></tr>
		<tr><td>DUI</td><td>"; $uno = mysql_fetch_array(mysql_query("select dui from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[dui]";
		echo "
		</td></tr>
		<tr><td>NIT</td><td>"; $uno = mysql_fetch_array(mysql_query("select nit from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[nit]";
		echo "
		</td></tr>
		<tr><td>* Residencia</td><td>"; $uno = mysql_fetch_array(mysql_query("select dir from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[dir]";
		echo "
		</td></tr>
		<tr><td>* Telefono</td><td>"; $uno = mysql_fetch_array(mysql_query("select numero from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[numero]";
		echo "
		</td></tr>
		<tr><td>* Departamento</td><td>"; $uno = mysql_fetch_array(mysql_query("select depto from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[depto]";
		echo "
		</td></tr>
		<tr><td>* Ciudad</td><td>"; $uno = mysql_fetch_array(mysql_query("select ciudad from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[ciudad]";
		echo "
		</td></tr>
		<tr><td>* Estado Civil</td><td>"; $uno = mysql_fetch_array(mysql_query("select estado_civil from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[estado_civil]";
		echo "
		</td></tr>
		<tr><td>* Edad</td><td>"; $uno = mysql_fetch_array(mysql_query("select edad from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[edad]";
		echo "
		</td></tr>
		<tr><td>* Fecha de Registro</td>"; 
		$uno = mysql_fetch_array(mysql_query("select fecha from paciente where id_paciente='$_POST[nombre]'")); 
		
		$fechaa = explode ('-',$uno['fecha']);
			$ano1= $fechaa[0];
			$mes1 = $fechaa[1];
			$dia1 = $fechaa[2];
			$sep= "/";
			$fecha_completaa = $dia1.$sep.$mes1.$sep.$ano1;
			echo "<td>".$fecha_completaa."</td>";
		//echo "$uno[fecha]";
		
		echo "
		</td></tr>
		<tr><td>* Fecha de Nacimiento</td>"; 
		$uno = mysql_fetch_array(mysql_query("select fecha_nacimiento from paciente where id_paciente='$_POST[nombre]'")); 
		
		$fechaa = explode ('-',$uno['fecha_nacimiento']);
			$ano= $fechaa[0];
			$mes = $fechaa[1];
			$dia = $fechaa[2];
			$fecha_completaa = $dia.$sep.$mes.$sep.$ano;
			echo "<td>".$fecha_completaa."</td>";
		
		//echo "$uno[fecha_nacimiento]";
		echo "
		</td></tr>
		<tr><td>E-Mail</td><td>"; $uno = mysql_fetch_array(mysql_query("select email from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[email]";
		echo "
		</td></tr>
		<tr><td align=center colspan=2>Datos Adicionales</td></tr>
		<tr><td>* Ocupacion</td><td>"; $uno = mysql_fetch_array(mysql_query("select ocupacion from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[ocupacion]";
		echo "
		</td></tr>
		<tr><td>Lugar de Trabajo</td><td>"; $uno = mysql_fetch_array(mysql_query("select lugar_trabajo from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[lugar_trabajo]";
		echo "
		</td></tr>
		<tr><td>Direccion de Trabajo</td><td>"; $uno = mysql_fetch_array(mysql_query("select dir_trabajo from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[dir_trabajo]";
		echo "
		</td></tr>
		<tr><td>Telefono de Trabajo</td><td>"; $uno = mysql_fetch_array(mysql_query("select tel_trabajo from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[tel_trabajo]";
		echo "
		</td></tr>
		<tr><td>Departamento</td><td>"; $uno = mysql_fetch_array(mysql_query("select departamento from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[departamento]";
		echo "
		</td></tr>
		<tr><td align=center colspan=2>Datos Medicos</td></tr>
		<tr><td>* Tipo de Sangre</td><td>"; $uno = mysql_fetch_array(mysql_query("select tipo_sangre from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[tipo_sangre]";
		echo "
		</td></tr>
		<tr><td>* Peso</td><td>"; $uno = mysql_fetch_array(mysql_query("select peso from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[peso]";
		echo "
		Lbs</td></tr>
		<tr><td>* Presion</td><td>"; $uno = mysql_fetch_array(mysql_query("select presion from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[presion]";
		echo "
		</td></tr>
		<tr><td>* Sexo</td><td>"; $uno = mysql_fetch_array(mysql_query("select sexo from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[sexo]";
		echo "
		</td></tr>
		<tr><td>* Altura</td><td>"; $uno = mysql_fetch_array(mysql_query("select talla from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[talla]";
		echo "
		</td></tr>
		<tr><td>Antecedentes</td><td>"; $uno = mysql_fetch_array(mysql_query("select antecedentes from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[antecedentes]";
		echo "
		</td></tr>
		<tr><td>Remitido</td><td>"; $uno = mysql_fetch_array(mysql_query("select remitido from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[remitido]";
		echo "
		</td></tr>
		<tr><td>Responsable</td><td>"; $uno = mysql_fetch_array(mysql_query("select responsable from paciente where id_paciente='$_POST[nombre]'")); echo "$uno[responsable]";
		echo "
		</td></tr>
		<tr><td align=center colspan=2><a href='modificar_paciente.php?id=$id[id_paciente]'>Modificar Datos de Paciente</a></td></tr>
		";
		if($expedient = mysql_num_rows(mysql_query("select id_expediente from expedientes where id_paciente='$_POST[nombre]'"))>0)
		{
		echo "<tr><td align=center colspan=2><a href='entrada_expediente_paciente.php?id=$_POST[nombre]'>Nueva entrada de expediente</a></td></tr>";
		}
		else
		{
		echo "
		<tr><td align=center colspan=2><a href='nuevo_expediente_paciente.php?id=$_POST[nombre]'>Crear expediente de Paciente</a></td></tr>";
		}
		echo "</table>";
	}
 }
 ?>