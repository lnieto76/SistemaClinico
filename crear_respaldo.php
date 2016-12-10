<?php
 if(IsSet($_POST["Respaldo"]))
       {
          header("Content-type: text/sql");
          header("Content-Disposition: attachment; filename=respaldo_consultorio.sql");
          $Respaldo = `mysqldump --password=usbw --user=root doctora`;
		  $des = base64_encode($Respaldo);
          //$des = $Respaldo;
		  echo $des;
          exit;
       }
session_start();
if(isset($_SESSION["Administrador"]))
{
	//require('index.php');
	echo "<div align=right><font color=white>Usted a iniciado sesion como:      </font><font color=white size=+2>".$_SESSION['Administrador']."</font></div>";
}
else
{
	echo "<script>alert('No tiene permisos para ver el sistema debe iniciar sesion REDIRECCIONANDO....');location.replace('index.php');</script>";
}
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "doctora"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con);

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
<!DOCTYPE PUBLIC html \"~//W3C//DTD//XHTML 1.1//EN\" \"http://www.w3.org/DTD/xhtml11.dtd\" />
<html xmlns=\"http://www.w3.org/1999/xhtml\">
	<center><font color=white size=5>Creación de Respaldos</center>
	<form method=\"post\" action=\"$_SERVER[PHP_SELF]\" enctype=\"multipart/form-data\">
		<center>
		<table>	
			<tr>
				<td colspan=2><br><center><img src=database.jpg width=100 heigth=100></center></td>
			</tr>		
			<tr>
				<td colspan=2><br><center><input type=submit value=\"Crear Respaldo\" name=Respaldo id=idRespaldo></center></td>
			</tr>			
		</table>
	</center>
</body>";
?>