<?php
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "doctora"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con);

session_start();
if(isset($_SESSION["Administrador"]))
{
	if($mostrar=mysql_fetch_array(mysql_query("select * from usuarios where usuario='$_SESSION[Administrador]'")))
	{
		echo "Ha iniciado sesion como:<font color=red> $mostrar[nombre] </font>con permisos de Administrador ";
		echo "<font color=red>$_SESSION[Administrador]</font><br>";
	}
}
elseif(isset($_SESSION["Usuario"]))
{
	if($mostrar=mysql_fetch_array(mysql_query("select * from usuarios where usuario='$_SESSION[Usuario]'")))
	{
		echo "Ha iniciado sesion como:<font color=red> $mostrar[nombre] </font>con permisos de: Usuario Limitado </font>";
		echo "<font color=red>$_SESSION[Usuario]</font><br>";
	}
}
else
{
	echo "<script>alert('No tiene permisos para ver el sistema será REDIRECCIONADO al inicio de sesion');location.replace('index.php')</script>";
}

if($_GET['id'])
{
	if(isset($_POST['Aceptar_color_fondo']))
	{
	if($si=mysql_query("update configuracion set color_fondo='$_GET[id]'"))
	{
		echo "<script>alert('Color de FONDO del sistema modificado correctamente');window.close()</script>";
	}
	else
	{
		echo mysql_error();
	}
}
}
echo "
<form method=post>
";
$color_letra=mysql_fetch_array(mysql_query("select color_letra from configuracion"));
echo "
<body bgcolor=$_GET[id]>
<font color='$color_letra[color_letra]'>
El color de LETRA que usted ha seleccionado es el que se presenta actualmente<br>
si usted esta deacuerdo con el color actual y que se establesca para <br>
funcionar en la interfaz del sistema presione SI o sino esta seguro<br>
presiona cancelar y se cerrara la pantalla automaticamente.</font><br><br>
<input type=submit name='Aceptar_color_fondo' value='SI'><a href=javascript:window.close(); alt=cerrar ventana>No</a>
</form>
";

?>