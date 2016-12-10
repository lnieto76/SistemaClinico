<?php
session_start();

echo"
<body onLoad=\"checkAGE()\" id=\"body\" bgcolor=\"black\">
<script language=\"javascript\" type=\"text/javascript\">
function checkAGE()
{

if (confirm('Esta seguro de eliminar este usuario?, se eliminara definitivamente!!'))
{
	location.href=\"e_usuarios.php?id=$_GET[id]\";
}
else
{
history.go(-1);
}
return 0;
}
</script></body>
";
?>