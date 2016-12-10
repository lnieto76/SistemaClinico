<?php
session_start();
?>
<body onLoad="checkAGE()" id="body" bgcolor="black">
<script language="javascript" type="text/javascript">
function checkAGE()
{

if (confirm('Esta seguro que desea cerrar sesion?, Saldra del sistema y sera redireccionado a la pagina de inicio de sesion'))
{
	location.href="cerrar_sesion.php";
}
else
{
history.go(-1);
}
return 0;
}
</script></body>
