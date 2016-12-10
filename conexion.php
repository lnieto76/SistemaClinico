<?php
//Configuracion de la conexion a base de datos
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
		echo "<font color=red>Usuario: $_SESSION[Administrador]</font> <a href= 'close.php'>Cerrar Sesion</a>";
	}
}
elseif(isset($_SESSION["Usuario"]))
{
	if($mostrar=mysql_fetch_array(mysql_query("select * from usuarios where usuario='$_SESSION[Usuario]'")))
	{
		echo "Ha iniciado sesion como:<font color=red> $mostrar[nombre] </font>con permisos de: Usuario Limitado </font>";
		echo "<font color=red>Usuario: $_SESSION[Usuario]</font> <a href= 'close.php'>Cerrar Sesion</a>";
	}
}
else
{
	echo "<script>alert('No tiene permisos para ver el sistema será REDIRECCIONADO al inicio de sesion');history.go(-1);</script>";
}

$color_letra=mysql_fetch_array(mysql_query("select color_letra from configuracion"));
$color_fondo=mysql_fetch_array(mysql_query("select color_fondo from configuracion"));
$tipo_letra=mysql_fetch_array(mysql_query("select tipo_letra from configuracion"));
echo "
<head><title>..::Consultorio Dra. Gonzalez::..</title></head>
<style>
Body 
{
color:'$color_letra[color_letra]'; 
font-family:'$tipo_letra[tipo_letra]';
}
fieldset
{
     border: 2px solid #000000;
	 width:70%;
	 heigth:300%; 
	 padding:20px; 
	 align:center;
	 
}
</style>
<body bgcolor='$color_fondo[color_fondo]'>
";
?>