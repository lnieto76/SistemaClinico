<?php
require('conexion.php');
 if($_GET['id'])
 {
 $id_paciente=$_GET['id'];
	if($id = mysql_fetch_array(mysql_query("select id_paciente from paciente where id_paciente='$id_paciente'")))
	{
		echo "
		<form method=post enctype=\"multipart/form-data\">
		<br><h3>Modificar datos de paciente</h3><br>Los campos con * son campos requeridos!!<br><br>
		<table align=center border=1 color=white>
		<tr><td align=center colspan=2>Paciente</td></tr>
		<tr><td>* Nombre Completo</td><td>"; $uno = mysql_fetch_array(mysql_query("select nombre_completo from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=nombre_completo size=80 maxlength=200 value='$uno[nombre_completo]'>";
		echo "
		</td></tr>
		<tr><td>Foto</td><td align=center>"; $uno = mysql_fetch_array(mysql_query("select foto from paciente where id_paciente='$id_paciente'")); echo "<img src=\"data:image/jpg;base64,".base64_encode($uno["foto"])."\" width=200 height=150>";
		echo "
		</td></tr>
		<tr><td>Cambiar foto</td><td>Si<input type=radio name='cambiar_foto' value='Si'>No<input type=radio name='cambiar_foto' value='No'><input type=file name=foto></td></tr>
		<tr><td>DUI</td><td>"; $uno = mysql_fetch_array(mysql_query("select dui from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=dui size=20 maxlength=17 value='$uno[dui]'>";
		echo "
		</td></tr>
		<tr><td>NIT</td><td>"; $uno = mysql_fetch_array(mysql_query("select nit from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=nit size=15 maxlength=10 value='$uno[nit]'>";
		echo "
		</td></tr>
		<tr><td>Residencia</td><td>"; $uno = mysql_fetch_array(mysql_query("select dir from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=dir size=80 maxlength?150 value='$uno[dir]'>";
		echo "
		</td></tr>
		<tr><td>Telefono</td><td>"; $uno = mysql_fetch_array(mysql_query("select numero from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=numero size=10 maxlength=9 value='$uno[numero]'>";
		echo "
		</td></tr>
		<tr><td>Departamento</td><td>"; $uno = mysql_fetch_array(mysql_query("select depto from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=depto size=30 maxlength=30 value='$uno[depto]'>";
		echo "
		</td></tr>
		<tr><td>Ciudad</td><td>"; $uno = mysql_fetch_array(mysql_query("select ciudad from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=ciudad size=30 maxlength=30 value='$uno[ciudad]'>";
		echo "
		</td></tr>
		<tr><td>Estado Civil</td><td>"; $uno = mysql_fetch_array(mysql_query("select estado_civil from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=estado_civil size=20 maxlength=20 value='$uno[estado_civil]'>";
		echo "
		</td></tr>
		<tr><td>* Edad</td><td>"; $uno = mysql_fetch_array(mysql_query("select edad from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=edad size=5 maxlength=2 value='$uno[edad]'>";
		echo "
		</td></tr>
		<tr><td>* Fecha de Registro</td><td>"; $uno = mysql_fetch_array(mysql_query("select fecha from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=fecha size=10 maxlength=10 value='$uno[fecha]'>";
		echo "
		</td></tr>
		<tr><td>* Fecha de Nacimiento</td><td>"; $uno = mysql_fetch_array(mysql_query("select fecha_nacimiento from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=fecha_nacimiento size=10 maxlength=10 value='$uno[fecha_nacimiento]'>";
		echo "
		</td></tr>
		<tr><td>E-Mail</td><td>"; $uno = mysql_fetch_array(mysql_query("select email from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=email size=30 maxlength=40 value='$uno[email]'>";
		echo "
		</td></tr>
		<tr><td align=center colspan=2>Datos Adicionales</td></tr>
		<tr><td>* Ocupacion</td><td>"; $uno = mysql_fetch_array(mysql_query("select ocupacion from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=ocupacion size=40 maxlength=50 value='$uno[ocupacion]'>";
		echo "
		</td></tr>
		<tr><td>Lugar de Trabajo</td><td>"; $uno = mysql_fetch_array(mysql_query("select lugar_trabajo from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=lugar_trabajo size=40 maxlength=50 value='$uno[lugar_trabajo]'>";
		echo "
		</td></tr>
		<tr><td>Direccion de Trabajo</td><td>"; $uno = mysql_fetch_array(mysql_query("select dir_trabajo from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=dir_trabajo size=60 maxlength=100 value='$uno[dir_trabajo]'>";
		echo "
		</td></tr>
		<tr><td>Telefono de Trabajo</td><td>"; $uno = mysql_fetch_array(mysql_query("select tel_trabajo from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=tel_trabajo size=10 maxlength=9 value='$uno[tel_trabajo]'>";
		echo "
		</td></tr>
		<tr><td>Departamento</td><td>"; $uno = mysql_fetch_array(mysql_query("select departamento from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=departamento size=40 maxlength=50 value='$uno[departamento]'>";
		echo "
		</td></tr>
		<tr><td align=center colspan=2>Datos Medicos</td></tr>
		<tr><td>Tipo de Sangre</td><td>"; $uno = mysql_fetch_array(mysql_query("select tipo_sangre from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=tipo_sangre size=15 maxlength=20 value='$uno[tipo_sangre]'>";
		echo "
		</td></tr>
		<tr><td>* Peso</td><td>"; $uno = mysql_fetch_array(mysql_query("select peso from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=peso size=5 maxlength=3 value='$uno[peso]'>";
		echo "
		Lbs</td></tr>
		<tr><td>Presion</td><td>"; $uno = mysql_fetch_array(mysql_query("select presion from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=presion size=15 maxlength=20 value='$uno[presion]'>";
		echo "
		</td></tr>
		<tr><td>* Sexo</td><td>Masculino<input type=radio name=sexo value=Masculino>Femenino<input type=radio name=sexo value=Femenino> Seleccione: ";
		$uno = mysql_fetch_array(mysql_query("select sexo from paciente where id_paciente='$id_paciente'")); 
		echo "$uno[sexo]"; 
		echo "</td></tr>
		<tr><td>* Altura</td><td>"; $uno = mysql_fetch_array(mysql_query("select talla from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=talla size=5 size=4 value='$uno[talla]'>";
		echo "
		</td></tr>
		<tr><td>Antecedentes</td><td>"; $uno = mysql_fetch_array(mysql_query("select antecedentes from paciente where id_paciente='$id_paciente'")); echo "<textarea name=antecedentes maxlength=200 cols=60 rows=3>$uno[antecedentes]</textarea>";
		echo "
		</td></tr>
		<tr><td>Remitido</td><td>"; $uno = mysql_fetch_array(mysql_query("select remitido from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=remitido size=25 maxlength=30 value='$uno[remitido]'>";
		echo "
		</td></tr>
		<tr><td>Responsable</td><td>"; $uno = mysql_fetch_array(mysql_query("select responsable from paciente where id_paciente='$id_paciente'")); echo "<input type=text name=responsable size=75 maxlength=150 value='$uno[responsable]'>";
		echo "
		</td></tr>
		<tr><td align=center colspan=2><input type=submit value='Modificar Datos'></td></tr>
		</table></form>";
		if($_POST)
		{
			
			if($_POST['cambiar_foto']=='Si')
			{
				$Imagen = "";
				if($_FILES)
				{
					$Imagen = file_get_contents($_FILES["foto"]["tmp_name"]);
					$Imagen = mysql_escape_string($Imagen);
				}
				if($modificar= mysql_query("UPDATE paciente SET nombre_completo='$_POST[nombre_completo]', foto='$Imagen', dui='$_POST[dui]', nit='$_POST[nit]', dir='$_POST[dir]', numero='$_POST[numero]', depto='$_POST[depto]', ciudad='$_POST[ciudad]', estado_civil='$_POST[estado_civil]', edad='$_POST[edad]', fecha='$_POST[fecha]',fecha_nacimiento='$_POST[fecha_nacimiento]', email='$_POST[email]', ocupacion='$_POST[ocupacion]', lugar_trabajo='$_POST[lugar_trabajo]', dir_trabajo='$_POST[tel_trabajo]', departamento='$_POST[departamento]', tipo_sangre='$_POST[tipo_sangre]', peso='$_POST[peso]', presion='$_POST[presion]', sexo='$_POST[sexo]', talla='$_POST[talla]', antecedentes='$_POST[antecedentes]', remitido='$_POST[remitido]', responsable='$_POST[responsable]'"))
				{
				echo "<script>alert('Paciente $_POST[nombre_completo] modificado con exito')</script>"; 
				}
				else
				{
					echo "<script>alert('Error al intentar modificar los datos')</script>";
					echo mysql_error();
				}
			}
			elseif($_POST['cambiar_foto']=='No')
			{
				if($modificar= mysql_query("UPDATE paciente SET nombre_completo='$_POST[nombre_completo]', dui='$_POST[dui]', nit='$_POST[nit]', dir='$_POST[dir]', numero='$_POST[numero]', depto='$_POST[depto]', ciudad='$_POST[ciudad]', estado_civil='$_POST[estado_civil]', edad='$_POST[edad]', fecha='$_POST[fecha]',fecha_nacimiento='$_POST[fecha_nacimiento]', email='$_POST[email]', ocupacion='$_POST[ocupacion]', lugar_trabajo='$_POST[lugar_trabajo]', dir_trabajo='$_POST[tel_trabajo]', departamento='$_POST[departamento]', tipo_sangre='$_POST[tipo_sangre]', peso='$_POST[peso]', presion='$_POST[presion]', sexo='$_POST[sexo]', talla='$_POST[talla]', antecedentes='$_POST[antecedentes]', remitido='$_POST[remitido]', responsable='$_POST[responsable]'"))
				{
				echo "<script>alert('Paciente $_POST[nombre_completo] modificado con exito')</script>"; 
				}
				else
				{
					echo "<script>alert('Error al intentar modificar los datos')</script>";
					echo mysql_error();
				}
			}
		}
	}
 }
 ?>