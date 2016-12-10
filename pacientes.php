<?php
require('conexion.php');
$nombre =ucwords(@$_POST["nombre_completo"]);
$ciudad= ucwords(@$_POST["ciudad"]);
if($_POST)
{
			$Imagen = "";
				if($_FILES)
				{
					$Imagen = file_get_contents($_FILES["foto"]["tmp_name"]);
					$Imagen = mysql_real_escape_string($Imagen);
				}
	if($registrar = mysql_query("insert into paciente(nombre_completo,foto,dui,nit,dir,numero,depto,ciudad,estado_civil,edad,fecha,fecha_nacimiento,email,ocupacion,lugar_trabajo,dir_trabajo,tel_trabajo,departamento,tipo_sangre,peso,presion,sexo,talla,antecedentes,remitido,responsable) values('$nombre','$Imagen','$_POST[dui]','$_POST[nit]','$_POST[dir]','$_POST[numero]','$_POST[depto]','$ciudad','$_POST[estado_civil]','$_POST[edad]','$$_POST[fecha]','$$_POST[fechanac]','$_POST[email]','$_POST[ocupacion]','$_POST[lugar_trabajo]','$_POST[dir_trabajo]','$_POST[tel_trabajo]','$_POST[departamento]','$_POST[tipo_sangre]','$_POST[peso]','$_POST[presion]','$_POST[sexo]','$_POST[talla]','$_POST[antecedentes]','$_POST[remitido]','$_POST[responsable]')"))
	{
		echo "<script>alert('Paciente $nombre registrado con exito')</script>";
	}
	else
	{
		echo mysql_error();
	}
}
echo "<form method=post enctype=\"multipart/form-data\">";

?>
<script type="text/javascript" language="javascript"> 
 
function mostrardiv() 
{ 
div = document.getElementById('flotante');
div.style.display = '';
}

function cerrar() {
 
div = document.getElementById('flotante');
 
div.style.display='none';
 
}

function mostrardiv2() 
{ 
div = document.getElementById('flotantes');
div.style.display = '';
}

function cerrar2() {
 
div = document.getElementById('flotantes');
 
div.style.display='none';
 
}
 
</script>

<h2>Ingreso de Pacientes:</h2><br>
Los campos con * son campos obligatorios<br><br>
<center>
<fieldset align=center><legend align=left>Datos de Contacto</legend>
<br>
<table align=center>
<tr><td>* Nombre Completo</td><td><input type=text name=nombre_completo maxlength=100 size=80></td></tr>
<tr><td>Foto</td><td><input type=file name=foto></td></tr>
<tr><td>DUI</td><td><input type=text name=dui maxlength=10 size=10></td></tr>
<tr><td>NIT</td><td><input type=text name=nit maxlength=17 size=15></td></tr>
<tr><td>Direccion</td><td><input type=text name=dir maxlength=150 size=80></td></tr>
<tr><td>Telefono</td><td><input type=text name=numero maxlength=9 size=15></td></tr>
<tr><td>Departamento</td><td>
<select name="depto" id="idepto">
		<option value="sel" selected="selected">!-Seleccione-!</option>
			<optgroup label="Zona Occidental">
				<option value="Santa Ana">Santa Ana</option>
				<option value="Ahuachapan">Ahuachapan</option>
				<option value="Sonsonate">Sonsonate</option>				
			</optgroup>
			<optgroup label="Zona Central">
			<option value="San Salvador">San Salvador</option>
			<option value="La Libertad">La Libertad</option>
			<option value="Chalatenango">Chalatenango</option>
			<option value="Cabanas">Cabañas</option>
			<option value="Cuzcatlan">Cuzcatlan</option>
			<option value="La Paz">La Paz</option>
			<option value="San Vicente">San Vicente</option>
			</optgroup>
			<optgroup label="Zona Oriental">
				<option value="San Miguel">San  Miguel</option>
				<option value="La Union">La Union</option>
				<option value="Morazan">Morazan</option>
				<option value="Usulutan">Usulutan</option>
			</optgroup>
	</select>
</td></tr>
<tr><td>Ciudad</td><td><input type=text name=ciudad maxlength=30 size=20></td></tr>
<tr><td>Estado Civil</td><td>
<select name="estado_civil">
<option value="seleccione">!-Seleccione-!</option>
<option value="Soltero">Soltero/a</option>
<option value="Soltero">Casado/a</option>
<option value="Soltero">Viudo/a</option>
<option value="Soltero">Divorciado/a</option>
<option value="Soltero">Acompañado/a</option>
</select>
</td></tr>
<tr><td>* Edad</td><td><input type=text name=edad maxlength=2 size=10>Años</td></tr>
<tr>
<td>* Fecha de Registro</td>
<td><input type=date name=fecha></td>
</tr>
<tr><td>* Fecha de Nacimiento</td>
<td><input type=date name=fechanac></td>
</tr>
<tr><td>E-Mail</td><td><input type=text name=email maxlength=40 size=50></td></tr>
</table></fieldset>
</center>
<div id="mostrarDiv" align=center><a href="javascript:mostrardiv();" align="center"><h3><center>Agregar Datos adicionales</center></h3></a></div>
<div id="flotante" style="display:none;" align=center>
<fieldset align=center><legend align=left>Datos Adicionales</legend>
<br>
<table align=center>
<tr><td>* Ocupacion</td><td><input type=text name=ocupacion maxlength=50 size=60></td></tr>
<tr><td>Lugar de Trabajo</td><td><input type=text name=lugar_trabajo maxlength=50 size=60></td></tr>
<tr><td>Direccion de Trabajo</td><td><input type=text name=dir_trabajo maxlength=100 size=90></td></tr>
<tr><td>Telefono de Trabajo</td><td><input type=text name=tel_trabajo maxlength=9 size=10></td></tr>
<tr><td>Departamento</td><td>
<select name="departamento">
		<option value="sel" selected="selected">!-Seleccione-!</option>
			<optgroup label="Zona Occidental">
				<option value="Santa Ana">Santa Ana</option>
				<option value="Ahuachapan">Ahuachapan</option>
				<option value="Sonsonate">Sonsonate</option>				
			</optgroup>
			<optgroup label="Zona Central">
			<option value="San Salvador">San Salvador</option>
			<option value="La Libertad">La Libertad</option>
			<option value="Chalatenango">Chalatenango</option>
			<option value="Cabanas">Cabañas</option>
			<option value="Cuzcatlan">Cuzcatlan</option>
			<option value="La Paz">La Paz</option>
			<option value="San Vicente">San Vicente</option>
			</optgroup>
			<optgroup label="Zona Oriental">
				<option value="San Miguel">San  Miguel</option>
				<option value="La Union">La Union</option>
				<option value="Morazan">Morazan</option>
				<option value="Usulutan">Usulutan</option>
			</optgroup>
	</select>
</td></tr>
<tr><td colspan="2" align="center"><a href="javascript:cerrar();"><h3>Presiona aquí para contraer</h3></a></td><td></td></tr>
</table></fieldset>
</div>

<div id="mostrarDiv" align=center><a href="javascript:mostrardiv2();" align="center"><h3><center>Agregar Datos Medicos</center></h3></a></div>
<div id="flotantes" style="display:none;" align=center>

<fieldset align=center><legend align=left>Datos Medicos</legend>
<br>
<table align=center>
<tr><td>Tipo de Sangre</td><td><input type=text name=tipo_sangre maxlength=20 size=20></td></tr>
<tr><td>* Peso</td><td><input type=text name=peso maxlength=3 size=10>Lbs</td></tr>
<tr><td>Presion</td><td><input type=text name=presion maxlength=20 size=25></td></tr>
<tr><td>* Sexo</td><td>Masculino<input type=radio name=sexo value=Masculino>
Femenino<input type=radio name=sexo value=Femenino></td></tr>
<tr><td>* Altura</td><td><input type=text name=talla maxlength=4 size=20>Mts</td></tr>
<tr><td>Antecedentes</td><td><textarea name=antecedentes maxlength=200 rows=3 cols=50></textarea></td></tr>
<tr><td>Remitido</td><td><input type=text name=remitido maxlength=30 size=40></td></tr>
<tr><td>Responsable</td><td><input type=text name=responsable maxlength=150 size=80></td></tr>
<tr><td colspan=2 align=center><input type=submit value='Registrar Paciente'></td></tr>
<tr><td colspan="2" align="center"><a href="javascript:cerrar2();"><h3> Presiona aquí para contraer</h3></a></td><td></td></tr>
</table></fieldset>
</div>
</form>