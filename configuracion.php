<?php
require('conexion.php');

$color_fondo=mysql_fetch_array(mysql_query("select color_fondo from configuracion", $con));
$color_letra=mysql_fetch_array(mysql_query("select color_letra from configuracion", $con));
$tipo_letra=mysql_fetch_array(mysql_query("select tipo_letra from configuracion", $con));
echo "<font color=$color_letra[color_letra]>";
echo "<body bgcolor=$color_fondo[color_fondo]>";
echo "<font face=$tipo_letra[tipo_letra]>";
?>
<h2>Configuracion de la interfaz grafica del sistema!</h2>

En esta pantalla puede hacer tres tipos de configuraciones las cuales son:
<br>
 - Color de fondo<br> - Color de letra<br> - Tipo de letra<br><br>
 Solo selecciona a continuacion la configuracion que necesita y tendras una vista previa del cambio que has realizado<br>
 y si te parece te preguntara ¿Desea realizar el cambio en la configuracion?<br>
 la opcion si realiza el cambio y la opcion no te regresa a la pagina de configuracion<br><br><br><br><br>
 <script language="JavaScript">
function Abrir_ventana (pagina) {
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
window.open(pagina,"",opciones);
}
</script>

 
<table align=center border=3 cellspacing='7' cellpadding='7'>
<tr><td colspan=11 align=center>Tabla de configuraciones</td></tr>
<tr>
<td>Color de Fondo</td>
<td><a href="javascript:Abrir_ventana('previa.php?id=green')"><img src='colores/verde.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=pink')"><img src='colores/rosado.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=red')"><img src='colores/rojo.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=black')"><img src='colores/negro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=purple')"><img src='colores/morado.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=gray')"><img src='colores/gris.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=lightblue')"><img src='colores/celeste.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=brown')"><img src='colores/cafe.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=blue')"><img src='colores/azul.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa.php?id=yellow')"><img src='colores/amarillo.png'></img></a></td>
</tr>
<tr>
<td></td><td></td>
<td></td><td></td>
<td></td><td></td>
<td></td><td></td>
<td></td><td></td>
<td></td>
</tr>
<tr>
<td>Color de Letra</td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=green')"><img src='colores/verde_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=pink')"><img src='colores/rosado_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=red')"><img src='colores/rojo_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=black')"><img src='colores/negro_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=purple')"><img src='colores/morado_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=gray')"><img src='colores/gris_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=lightblue')"><img src='colores/celeste_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=brown')"><img src='colores/cafe_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=blue')"><img src='colores/azul_cuadro.png'></img></a></td>
<td><a href="javascript:Abrir_ventana('previa1.php?id1=yellow')"><img src='colores/amarillo_cuadro.png'></img></a></td>
</tr>
<tr>
<td></td><td></td>
<td></td><td></td>
<td></td><td></td>
<td></td><td></td>
<td></td><td></td>
<td></td>
</tr>
</table>
<br><br>
<table align=center border=3 cellspacing='7' cellpadding='7'>
<tr>
<td colspan=10 align=center>Tipo de letra</td></tr>
<tr>
<td><font face='Times New Roman'><a href="javascript:Abrir_ventana('previa2.php?id2=Times New Roman')">Times New Roman</a></font></td>
<td><font face='Calibri'><a href="javascript:Abrir_ventana('previa2.php?id2=Calibri')">Calibri</a></font></td>
<td><font face='Cambria'><a href="javascript:Abrir_ventana('previa2.php?id2=Cambria')">Cambria</a></font></td>
<td><font face='Arial'><a href="javascript:Abrir_ventana('previa2.php?id=2Arial')">Arial</a></font></td>
<td><font face='Arial Black'><a href="javascript:Abrir_ventana('previa2.php?id2=Arial Black')">Arial Black</a></font></td>
<td><font face='Batang'><a href="javascript:Abrir_ventana('previa2.php?id2=Batang')">Batang</a></font></td>
<td><font face='Castellar'><a href="javascript:Abrir_ventana('previa2.php?id2=Castellar')">Castellar</a></font></td>
<td><font face='Tahoma'><a href="javascript:Abrir_ventana('previa2.php?id2=Tahoma')">Tahoma</a></font></td>
<td><font face='Verdana'><a href="javascript:Abrir_ventana('previa2.php?id2=Verdana')">Verdana</a></font></td>
<td><font face='Trebuchet'><a href="javascript:Abrir_ventana('previa2.php?id2=Trebuchet')">Trebuchet</a></font></td>
</tr>
</table>
</font>