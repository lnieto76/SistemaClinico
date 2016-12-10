// JavaScript Document
var Conexion=false; 
var Servidor="consulta_ver_medicamentos.php"; 
var Palabra=""; 

function Conectar()
{
	if(window.XMLHttpRequest)
		Conexion=new XMLHttpRequest(); 
	else if(window.ActiveXObject)
		Conexion=new ActiveXObject("Microsoft.XMLHTTP"); 
}

function Contenido(idContenido)
{
	if(Conexion.readyState!=4) return;
	
	if(Conexion.status==200) 
	{
		
		if(Conexion.responseText)
		{
			document.getElementById(idContenido).style.display="block";
			document.getElementById(idContenido).innerHTML=Conexion.responseText;
		}else
			document.getElementById(idContenido).style.display="none";
	}else{
		document.getElementById(idContenido).innerHTML=Conexion.status+"-"+Conexion.statusText;
	}

	
	document.getElementById("reloj").style.visibility="hidden";

	Conexion=false;
}

function Solicitud(idContenido,Cadena)
{
	
	if(Cadena && Cadena!=Palabra)
	{
		
		if(Conexion) return; 
		Conectar();
		
		
		if(Conexion)
		{
			
			document.getElementById("reloj").style.visibility="visible";

			Palabra=Cadena;

			
			Conexion.open("POST",Servidor,true);

			
			Conexion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	
			
			Conexion.onreadystatechange=function()
			{
				Contenido(idContenido);
			}
			
			
			Conexion.send("idContenido="+idContenido+"&word="+Cadena);
		}else
			document.getElementById(idContenido).innerHTML="No disponible";
	}
}

function autocompletar(idContenido,Cadena)
{
	
	if(Cadena.length>=1)
	{
		if(Conexion!=false)
		{
			
			document.getElementById("reloj").style.visibility="hidden";
			
			Conexion.abort();
			Conexion=false;
		}
		Solicitud(idContenido,Cadena);
	}else
		document.getElementById(idContenido).style.display="none";
}


function selectItem(idContenido,id,value)
{
	document.getElementById("id").value=id;
	document.getElementById("input").value=value;
	
	autocompletar(idContenido,value);
}