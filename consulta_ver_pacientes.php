<?php
if(isset($_POST["word"]))
{
	
	$link=mysql_connect("localhost", "root", "root");
	mysql_select_db("doctora", $link);

	if($_POST["word"]{0}=="*")
		$result=mysql_query("SELECT * FROM paciente WHERE nombre_completo LIKE '%".substr($_POST["word"],1)."%' and nombre_completo<>'".$_POST["word"]."' ORDER BY nombre_completo LIMIT 10",$link);
	else
		$result=mysql_query("SELECT * FROM paciente WHERE nombre_completo LIKE '%".$_POST["word"]."%' and nombre_completo<>'".$_POST["word"]."' ORDER BY nombre_completo LIMIT 10",$link);

	while($row=mysql_fetch_array($result))
	{
		
		echo "<a href=\"javascript:selectItem('".$_POST["idContenido"]."','".$row["nombre_completo"]."','".$row["id_paciente"]."')\">".$row["nombre_completo"]."</a>";
	}
}
?>
