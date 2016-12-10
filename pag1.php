<?php
@header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
@header("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
@header ("Pragma: no-cache");
sleep(5);
//require('conexion.php'); 

$bd_host = "localhost"; 
$bd_usuario = "root"; 
$bd_password = "usbw"; 
$bd_base = "doctora"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con);

$RegistrosAMostrar=10;
//estos valores los recibo por GET
if(isset($_GET['pag'])){
$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
$PagAct=$_GET['pag'];  
//caso contrario los iniciamos 
}else{
$RegistrosAEmpezar=0;  
$PagAct=1;
 }
$fecha1= @$_POST['fecha1'];
$fecha2= @$_POST['fecha2'];
$Resultado=@mysql_query("SELECT * FROM paciente WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY nombre_completo LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$con);
echo "<table border='1px' align='center' bgcolor='gray'>
<th>
  <tr style=background-color=blue;>
  <td><font color=white>Foto</font></td>
	<td><font color=white>Nombre Completo</font></td>
	<td><font color=white>DUI</font></td>
	<td><font color=white>NIT</font></td>
	<td><font color=white>Direccion</font></td>
	<td><font color=white>Telefono</font></td>
	<td><font color=white>Depto</font></td>
	<td><font color=white>Ciudad</font></td>
	<td><font color=white>Estado Civil</font></td>
	<td><font color=white>Edad</font></td>
	<td><font color=white>Fecha de Nacimiento</font></td>
	<td><font color=white>Fecha de Registro</font></td>
	<td><font color=white>E-mail</font></td>
	<td><font color=white>Ocupacion</font></td>
	<td><font color=white>Lugar(Trabajo)</font></td>
	<td><font color=white>Direccion(Trabajo)</font></td>
	<td><font color=white>Telefono(Trabajo)</font></td>
	<td><font color=white>Departamento(Trabajo)</font></td>
	<td><font color=white>Tipo de Sangre</font></td>
	<td><font color=white>Peso</font></td>
	<td><font color=white>Presion</font></td>
	<td><font color=white>Sexo</font></td>
	<td><font color=white>Altura</font></td>
	<td><font color=white>Antecedentes</font></td>
	<td><font color=white>Remitido</font></td>
	<td><font color=white>Responsable</font></td>
</tr>
</th>";

    while($MostrarFila=mysql_fetch_array($Resultado)){ 
echo "<tr>";  
	 echo "<td><img src=\"data:image/jpg;base64,".base64_encode($MostrarFila["foto"])."\" width=200 height=150></td>";
     echo "<td><font color=white>".$MostrarFila['nombre_completo']."</font></td>";
     echo "<td><font color=white>".$MostrarFila['dui']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['nit']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['dir']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['numero']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['depto']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['ciudad']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['estado_civil']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['edad']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['fecha_nacimiento']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['fecha']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['email']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['ocupacion']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['lugar_trabajo']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['dir_trabajo']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['tel_trabajo']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['departamento']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['tipo_sangre']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['peso']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['presion']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['sexo']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['talla']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['antecedentes']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['remitido']."</font></td>";
	 echo "<td><font color=white>".$MostrarFila['responsable']."</font></td>";
     echo "</tr>"; 
     }

     echo "</table>"; 
     //******--------determinar las páginas---------******// 
     $NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM paciente WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY nombre_completo LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$con));
     $PagAnt=$PagAct-1; 
     $PagSig=$PagAct+1; 
     $PagUlt=$NroRegistros/$RegistrosAMostrar;
     
     //verificamos residuo para ver si llevará decimales 
     $Res=$NroRegistros%$RegistrosAMostrar; 
     // si hay residuo usamos funcion floor para que me 
     // devuelva la parte entera, SIN REDONDEAR, y le sumamos 
     // una unidad para obtener la ultima pagina
     
     if($Res>0) $PagUlt=floor($PagUlt)+1;  
     //desplazamiento

     $combo = "<select name=opcion onchange=\"Pagina(this.value)\">";
     for($a=1;$a<=$PagUlt;$a++)
     {
        $combo .= "<option value='$a' ";
        if(@$_GET["pag"]==$a){
            $combo .= " selected ";
        }
        $combo .= ">Pagina $a</option>";
     }
     $combo.="</select>";

   echo "<a onclick=Pagina('1')><img src=primera.gif></a>";
  if($PagAct>1)
	{  
  echo '<a onclick=Pagina('.$PagAnt.')><img src=anterior.gif></a> ';
	} 
  echo "<strong>"."$combo"."</strong>";
  
  if($PagAct<$PagUlt) 
  {
  echo ' <a onclick=Pagina('.$PagSig.')><img src=siguiente.gif></a> ';
  }
  echo '<a onclick=Pagina('.$PagUlt.')><img src=ultima.gif></a>';
  ?>