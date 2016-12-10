<?php
$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = ""; 
$bd_base = "doctora"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con);

if(isset($_POST["iniciar"]))
{
			if($ses=mysql_fetch_array(mysql_query("SELECT * FROM usuarios WHERE usuario='$_POST[nombre]' AND contrasena= md5('$_POST[clave]') AND tipo='Administrador'")))
			{
				session_start();
				$_SESSION["Administrador"] = $ses["usuario"];
				header("location: indexx.html");
				exit;
			}
			elseif($ses=mysql_fetch_array(mysql_query("SELECT * FROM usuarios WHERE usuario='$_POST[nombre]' AND contrasena= md5('$_POST[clave]') AND tipo='Usuario'")))
			{
				session_start();
				$_SESSION["Usuario"] = $ses["usuario"];
				header("location: indexx.html");
				exit;
			}
			else
			{
				echo "<script>alert('El usuario no existe')</script>";
			}

}
?>
<script language="javascript" type="text/javascript">
        function Usuarios()
        {
              if(document.getElementById('idnombre').value.length == 0 || 
              /^\s+$/.test(document.getElementById('idnombre').value))
              
              {
                alert ('Ingrese el usuario correctamente');
                document.getElementById('idnombre').focus();
                return false;
              
              }
              
              if(document.getElementById('idclave').value.length == 0 || 
              /^\s+$/.test(document.getElementById('idclave').value))
              
              {
                alert ('Ingrese su clave correctamente');
                document.getElementById('idclave').focus();
                return false;
              
              }
		}
		
function foco()
		{
			document.getElementById('idnombre').focus();
		}
</script>
<html>
<head><title>..::Consultorio Dra. Gonzalez::..</title></head>
<style>
Body 
{
color:'black'; 
font-family:'Arial';
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
<body onLoad="return foco();">
<font size=+1>..::Bienvenido al Sistema SISGIN::..</font>
<br><br>
<p align=center>Por favor digite su usuario y contrase&ntilde;a correspondientes</p>
<form method=POST onSubmit="return Usuarios();">
<br><br><br>
<table border=0 align=center> 
<tr>
<td colspan=2 align=center><img src=sesion.png></img></p>
	</td>
</tr>
<tr>
	<td>Usuario</td>
	<td><input type=text name=nombre maxlength=10 id=idnombre></td>
</tr>
<tr>
	<td>Contraseña</td>
	<td><input type=password name=clave maxlength=8 id=idclave></td>
</tr>
<tr>
	<td colspan=2><p align=center><input type=submit value=Iniciar&nbsp;Sesion name="iniciar"></td></p>
</tr>
</table>
</form><a href=javascript:window.close(); alt=cerrar ventana>Cerrar Ventana</a>