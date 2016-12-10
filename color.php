<?php
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = "root"; 
$bd_base = "doctora"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con);

$letra= @$_POST['tipo_letra'];
$color_fondo = @$_POST['color_fondo'];
$color_letra = @$_POST['color_letra'];

if($_POST)
{
	if($query = mysql_query("insert into configuracion values('$letra','$color_fondo','$color_letra')", $con))
	{
		echo "<script>alert('Bien hecho')</script>";
	}
	else
	{
		echo mysql_error();
	}
}

echo "
<body bgcolor='$color_fondo'>
<form method=post>
<br><center>Configurar Opciones Visuales</center><br><br>
<table align='center'>
<tr colspan=2>
<td>Elija el tipo de letra: </td>
</tr>
<tr><td>
<select name=tipo_letra>
<option value='Arial'><font face='Arial'>Arial</font></option>
<option value='Times New Roman'><font face='Times New Roman'>Times New Roman</font></option>
<option value='Calibri'><font face='Calibri'>Calibri</font></option>
<option value='Tunga'><font face='Tunga'>Tunga</font></option>
<option value='Book Antigua'><font face='Book Antigua'>Book Antigua</font></option>
</select>
</td></tr>
<tr><td>Elija el color de la letra:</td></tr>
<tr><td>
<select name=color_letra>
<option value='red'><font color='red'>Rojo</font></option>
<option value='green'><font color='green'>Verde</font></option>
<option value='yellow'><font color='yellow'>Amarillo</font></option>
<option value='black'><font color='black'>Negro</font></option>
<option value='brown'><font color='brown'>Cafe</font></option>
</select>
</td></tr>
<tr><td>Elija el color de fondo:</td></tr>
<tr><td>
<select name=color_fondo>
<option value='red'><font color='red'>Rojo</font></option>
<option value='green'><font color='green'>Verde</font></option>
<option value='yellow'><font color='yellow'>Amarillo</font></option>
<option value='black'><font color='black'>Negro</font></option>
<option value='brown'><font color='brown'>Cafe</font></option>
</select>
</td></tr>
<tr colspan='2'><td><input type=submit value='Seleccionar Color'></td></tr>
</table>
</form>
";


echo "<table align='center'><tr><td><font family='$letra' align='center'>Tipo de letra: $letra</font></td></tr>";
echo "<tr><td><font color='$color_letra' align='center'>Color de letra: $color_letra</font></td></tr>";
echo "<tr><td>Color de fondo: $color_fondo</td></tr></table>";


?>
</body>