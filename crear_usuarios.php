<?php
require('conexion.php');
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
<body bgcolor='$color_fondo[color_fondo]'>";

if(isset($_SESSION["Administrador"]))
{
	//require('index.php');
	echo "<div align=right><font color=white>Usted a iniciado sesion como:      </font><font color=white size=+2>".$_SESSION['Administrador']."</font></div>";
}
else
{
	echo "<script>alert('No tiene permisos para ver el sistema debe iniciar sesion REDIRECCIONANDO....');location.replace('login.php');</script>";
}
$fecha=@date("Y/m/d");
$hora=@date("h:i:s:a");
$nombre=ucwords(@$_POST["name"]);
		if($_POST) //nombre_completo,nombre,clave,cargo,hora,fecha
		{
			if($user = mysql_query("insert into usuarios (usuario,contrasena,nombre,tipo) values ('$_POST[usuario]',md5('$_POST[clave]'),'$nombre','$_POST[cargo]')"))
			{
			echo "<script>alert('Usuario $nombre con usuario: $_POST[usuario] almacenado con exito')</script>";
			}
			else
			{
			echo "<script>alert('Error en los datos. Posiblemente el usuario ya exista')</script>".mysql_error();
			}
		}
		?>
			<script>
          function Usuarios()
          {
              if(document.getElementById('idnombre').value.length == 0 ||  /^\s+$/.test(document.getElementById('idnombre').value))
              
              {
                alert ('Digite su nombre correctamente');
                document.getElementById('idnombre').focus();
                return false;
              
              }
			  if(document.getElementById('idnombree').value.length == 0 ||  /^\s+$/.test(document.getElementById('idnombree').value))
              
              {
                alert ('digite el usuario de su cuenta');
                document.getElementById('idnombree').focus();
                return false;
              
              }
              
              if(document.getElementById('idclave').value.length == 0 || 
              /^\s+$/.test(document.getElementById('idclave').value))
              
              {
                alert ('Ingrese la contrasena de su cuenta');
                document.getElementById('idclave').focus();
                return false;
              }
			  if(document.getElementById('idcargo').value == 'sele')
              
              {
                alert ('Elija el tipo de cuenta a crear');
                document.getElementById('idcargo').focus();
                return false;
              }
			  }
			  </script><head><title>**Ingreso de usuarios**</title>
<style>
a:hover{color:123456;}
a:link{color:white;}
a:visited{color:orange; text-decoration: none}
</style>
</head>
<h3>..::Creacion de Usuarios::..</h3>
<form method=post onSubmit="return Usuarios();"><br>
				<table border=0 align=center>
				<tr><td colspan=2 align=center><img src=sesion.png></td></tr>
				<tr><td colspan=2 align=center>Ingreso de Usuarios</td></tr>
				<tr><td>Nombre Completo</td><td><input type=text name=name maxlength=100 size="60" id=idnombre></td></tr>
				<tr><td>Usuario</td><td><input type=text name=usuario maxlength=10 id=idnombree></td></tr>
				<tr><td>Contraseña</td><td><input type=password name=clave maxlength=8 id=idclave></td></tr>
				<tr><td>Cargo</td><td><select name="cargo" id="idcargo"><option value="sele">Seleccione</option><option value="Administrador">Administrador</option><option value="Usuario">Usuario Limitado</option></select></td></tr>
				
				<tr><td colspan=2 align=center><input type=submit value="Crear Cuenta"></td>
				</table></form></body>