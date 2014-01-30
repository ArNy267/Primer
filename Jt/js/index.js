// JavaScript Document

$(document).on("ready", function(){
	
	
	$("#rutas").change(function(){
		
		if($(this).val() == 'Nueva'){
			
			$("#nuevaruta").css("display","block");
			$("#rutas").css("display","none");
			$("#Otraruta").attr( "name","Ruta");
			$(this).attr("name","Otro");
		}
			
		//$( "#trutas" ).html( "<input type='text' name='Ruta' class=''/><a onclick='volver()' ><img  width='15px' src='imagenes/cancel_f2.png' /></a> " );
		
		
		});
		
	$("#rutas").click(function(){
		
		if($(this).val() == 'Nueva'){
			
			$("#nuevaruta").css("display","block");
			$("#rutas").css("display","none");
		}
		
		});
		
	$("#quitar").click(function(){
		
		$("#nuevaruta").css("display","none");
		$("#rutas").css("display","block");
		$('#rutas').val('Ninguna');
		$("#Otraruta").attr( "name","Otro");
		$('#rutas').attr('name', 'Ruta');
		
	});


		
	//alert("we are here");
	
	
});

function showDir(str)
{
	if(str != "Ninguna"){
			
		if (str=="")
		  {
		  document.getElementById("txtHint").innerHTML="";
		  return;
		  } 
		  
		if(window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		xmlhttp.onreadystatechange=function()
		 {
		 
		  if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			}
		 }
	  
		xmlhttp.open("GET","obtenerutas.php?q="+str,true);
		xmlhttp.send();
	}
	else
	{
		return false;
	}
	
}
	
