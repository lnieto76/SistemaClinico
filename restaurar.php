<?php
session_start();
if(isset($_SESSION["Administrador"]))
{
	//require('index.php');
	echo "<div align=right>Usted a iniciado sesion como:<font size=+2>".$_SESSION['Administrador']."</font></div>";
}
else
{
	echo "<script>alert('No tiene permisos para ver el sistema debe iniciar sesion REDIRECCIONANDO....');location.replace('login.php');</script>";
}

$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "doctora"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con);

@$color_letra=mysql_fetch_array(mysql_query("select color_letra from configuracion"));
@$color_fondo=mysql_fetch_array(mysql_query("select color_fondo from configuracion"));
@$tipo_letra=mysql_fetch_array(mysql_query("select tipo_letra from configuracion"));

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
	<center><font color=white>Restaurar BD</font></center>
	<form method=POST action=\"$_SERVER[PHP_SELF]\" enctype=\"multipart/form-data\">
		<table align=center>	
			<tr>
				<td align=center><img src=database.jpg></td>
			</tr>		
			<tr>
			   <td><input type=file name=BackUpFile></td>
			</tr>
			<tr>
			   <td align=center><input type=submit name=Restore value=Restaurar&nbsp;BD></td>
			</tr>
		</table>
	</center>
</body>";
 if(IsSet($_POST["Restore"]) && $_FILES)
    {
		if($crear = mysql_query("create database doctora"))
		{
          $Ruta = $_FILES["BackUpFile"]["tmp_name"];
		  $nuevo = file_get_contents($Ruta);
		  $desencript = base64_decode($nuevo);
		  $abrir = fopen($Ruta, "w+");
		  fwrite($abrir,$desencript);
		  fclose($abrir);
          `mysql --password=root --user=root doctora < $Ruta`;   
		echo "<script>alert('Base de datos restaurada con exito')</script>";
		}
		else
		{
			echo "<script>alert('No se pudo crear la base de datos intente nuevamente')</script>";
		}
	}
?>