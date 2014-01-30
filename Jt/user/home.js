// JavaScript Document
$(document).on('ready', function(){
	
   $("#ProductoNuevo").on('click', function(){ /***** NUEVOS REGISTROS.  */
	
	/* $('#mytable tr').each(function() {
		// need this to skip the first row
		if ($(this).find("td:first").length > 0) {
		var cutomerId = $(this).find("td:first").html();
	  }
	   });	*/

		/* Esto lo uso si muestro el numero de productos agregados. */
		// var rowCount = $('.TablaPedidos tr').length - 1; // alert(rowCount);
		// Este lo uso si tengo el td con el valor de var Primero = $(".TablaPedidos tbody tr:eq("+rowCount+")").find("td:eq(0)").html();
		// var i = parseFloat(Primero) + 1;
			
	var rowCount = $(".LosProductos").val();
	var regCont = $('.TablaPedidos tr').length -1 ;	
	
	if(regCont == 0) /***************  CREAR UN CAMPO NUEVO     */
	{
		var kilos = "'kilos'";
		var valorCreciente = 0;
		var i = parseFloat(valorCreciente)+1;
		var htmlinsert = '<tr><!-- <td> 1 </td> -->';
			htmlinsert+= '<td> <input class="LosProductos" value="1" type="hidden"> <select id="productos1" class="SelectProducto" name="productos1" onchange="showUser(this.value, 1)">';
			htmlinsert+= '</select></td>';
			htmlinsert+= '<td><select name kilgramos onchange="calcular('+ kilos +',this.value,1,0,0 )" id="SelectKg1">  <option value=""> Kg. </option>';
			i = 5;
			 while( i <= 100)
			{ 
				htmlinsert+= '<option value="'+i+'">'+i+ ' Kg.</option>'; 	i = i +5;
			}
			htmlinsert+='</select></td>';
			htmlinsert+= '<td><select id="SelectGr1" name="gramos1" class="SelectGr1" onChange="calcular(this.value,1 )" > <option value="0"> Gr. </option>';
			j = 50;
			 while( j <= 1000)
			{ 
				htmlinsert+= '<option value="'+j+'">'+j+ ' Gr.</option>';  	j = j + 50;  
			}
			htmlinsert+='</select></td>';						
			htmlinsert+='<td><input type="checkbox"></td><td><div id="txtHint1">$</div></td> <td id="CostoProducto1"> $ </td><td id="CostoEnvio1">$</td>';
			htmlinsert+='<td class="elimina"><img class="Eliminar" src="../imagenes/eliminar.png"></td></tr>';
			//$(".SelectProductoBase").css('position' ,'absolute' . 'visibility', 'hidden' );
			
			$( ".TablaPedidos tbody" ).append( htmlinsert );
			$("#ObtenProductoBase").css("visibility", "visible"); 
			var opciones = $('select.SelectProductoBase option').clone();
			$('select.SelectProducto').append(opciones).css('width', '260px;');
			$("#ObtenProductoBase").css("visibility", "hidden");
			

	}
	else  /***************** AGERGAR UN CAMPO NUEVO   */ 
	{	var kilos = "'kilos'";
		var valorCreciente = $(".TablaPedidos tbody tr:eq("+regCont+") td ").find(".LosProductos").val();
		var i = parseFloat(valorCreciente)+1;
		var htmlinsert2 = '<tr>';
			htmlinsert2+= '<td><input type="hidden" value="'+ i +'" class="LosProductos"/>'; 
			htmlinsert2+= '<select id="productos'+ i +'" onChange="showUser(this.value,'+ i +')" style="width:260px" name="productos'+ i +'" class="SelectProducto'+ i +'"></select></td>';
			
			htmlinsert2+= '<td><select id="SelectKg'+ i +'" onChange="calcular('+kilos+',this.value,'+i+',0,0)"  name="kilogramos'+ i +'"></select></td>';
			htmlinsert2+= '<td><select class="SelectGr'+ i +'"  style="width:85px;" name="gramaje'+ i +'"></select></td>';
			htmlinsert2+= '<td><input type="checkbox" name="Altovacio'+ i +'"  /></td> <td><div id="txtHint'+ i +'"></div></td> <td id="CostoProducto'+i+'">$</td> <td id="CostoEnvio'+i+'">$</td>  ';
			htmlinsert2+= '<td class="elimina"> <img class="Eliminar" src="../imagenes/eliminar.png"> </td>';
			htmlinsert2+= '</tr>';

			$( ".TablaPedidos tbody" ).append(htmlinsert2);

			//copiamos los productos. 
			var opciones = $('select.SelectProducto option').clone();
			$('select.SelectProducto'+i+'').append(opciones).css('width', '260px;');
			//$('select').attr('name', 'productos'+ i +'').append(opciones);
			
			//copiamos los productos. 
			var kilos = $('select#SelectKg1 option').clone();
			$('select#SelectKg'+i+'').append(kilos); //.css('width', '57px;');
			
			var Gramos = $('select.SelectGr1 option').clone();
			$('select.SelectGr'+i+'').append(Gramos); //.css('width', '57px;');
			
			//<option value="">Seleccione Uno</option>'+$(".SelectProducto option").clone() +'
			i++	
			//$('select').each(function(){})

	}
		
				
			/*$(".TablaPedidos tbody tr:eq(1)").clone().removeClass('fila-base').appendTo(".TablaPedidos tbody");
			/*var NewRow = rowCount + 1 ;
			var NumProducto = $(".TablaPedidos tbody tr:eq("+ NewRow + ") td:eq(0)").html(rowCount);
			alert(NumProducto);  */
												
						/*$( ".TablaPedidos tbody" ).append( '<tr><td class="NumProducto"> '+ suma +' </td><td><select class="SelectProducto"><option value="">Seleccione Uno</option></select></td><td><select>                 	<option class="Unidades" value="">Kg.</option></select></td><td><select><option class="Unidades" value="">Gr.</option></select></td><td><input type="checkbox" /> </td><td>$</td><td>$</td><td class="elimina"><img class="Eliminar" src="../imagenes/eliminar.png"></td></tr>' );*/
				
				
	});
					
	 
			// Evento que selecciona la fila y la elimina 
	$(document).on("click",".elimina",function()
	{
		var parent = $(this).parents().get(0);
		$(parent).remove();
	});
	
	
	$(document).on("click","#enviar",function()
	{
		 var filas = $('.TablaPedidos >tbody >tr').length;
		
		$( ".TablaPedidos" ).append( '<input type="hidden" name="filas" value="'+filas+'">' );
		
		for(var i=1; i<filas; i++)
		{
			if($("#productos"+i).val() == "0")
			{
				alert("Falto completar un producto en la fila #"+i );
				$("#productos"+i).focus();
				return false;
			}
			
			if($("#SelectKg"+i).val() == "0")
			{
				alert("Falto asignar Kilogramos a un producto en la fila #"+i);
				$("#SelectKg"+i).focus();
				return false;
			}
			
			if($("#SelectGr"+i).val() == "0")
			{
				alert("Falto asignar cantidad de gramaje a un producto en la fila #"+i);
				$("#SelectGr"+i).focus();
				return false;
			}
		
		}
		
		$( "#formto" ).submit();
		
	});

});


function showUser(str,row) /**************  fUNCION DE AJAX  PARA TRAER LA INFORMACION.    */				
{
	if (str=="")
	  {
	  document.getElementById("txtHint"+row).innerHTML="";
	  return;
	  }

	var elem = str.split('-'); 	id = elem[0]; 	precio = elem[1]; costo =elem[2] 	//año = elem[2]; 
	  
	 // alert( "el id ="+id+" el precio = "+ precio +" el costo x envio = "+ costo);
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("txtHint"+row).innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","ObtenerProducto.php?q="+id+"&r="+row ,true);
	xmlhttp.send();
	
	calcular('producto',0,row,precio,costo);
		
}


function limpiarDiv(id) /*********** lIMPAR LA INFORMACION ANTERIOR PARA AGREGAR NUEVA			*/
        {
            var div;
 
                div = document.getElementById(id);
 				
                while(div.hasChildNodes())
                {
                    div.removeChild(div.lastChild);
                }
        }
 
/*************************/

function calculaPrecioProducto(PrecioFinal,row)
{
	var tdElem = document.getElementById("TotalProducto");
	//var tdText = tdElem.innerText | tdElem.textContent;
	var tdText = tdElem.textContent;	

	if(PrecioFinal == "")
	{
		tdElem.innerHTML= 0;
	}
	else
	{
		var mi_array = new Array(row);
		var suma = 0; 
		for(var i=1; i <= row; i++)
		{
			cantidad =	document.getElementById("CostoProducto"+i);
			var sumatoria = cantidad.textContent;
			
			//caracter-s que deseamos eliminar
			var patron="$";
			var patron2=",";
			//indicamos que queremos sustituir el patron por una cadena vacia
			cadena1=sumatoria.replace(patron,'');
			cadena =cadena1.replace(patron2,'');
			
			mi_array[i] = parseFloat(cadena);
			suma += mi_array[i];
			

		}
		//alert("este es el valos a sumar "+suma);
		tdElem.innerHTML=suma;
	}
}

/*************************/

function calculaPrecioEnvio(CostoFinal,row)
{
	var tdElem = document.getElementById("TotalEnvio");
	//var tdText = tdElem.innerText | tdElem.textContent;
	var tdText = tdElem.textContent;	

	if(CostoFinal == "")
	{
		tdElem.innerHTML= 0;
	}
	else
	{
		var mi_array = new Array(row);
		var suma = 0; 
		for(var i=1; i <= row; i++)
		{
			cantidad =	document.getElementById("CostoEnvio"+i);
			var sumatoria = cantidad.textContent;
			
			//caracter-s que deseamos eliminar
			var patron="$";
			var patron2=",";
			//indicamos que queremos sustituir el patron por una cadena vacia
			cadena1=sumatoria.replace(patron,'');
			cadena =cadena1.replace(patron2,'');
			
			mi_array[i] = parseFloat(cadena);
			suma += mi_array[i];

		}
		//alert("este es el valos a sumar "+suma);
		tdElem.innerHTML=suma;
	
	}

}

/*************************/

function CalculaTotalPedido()
{
	TotProd =	document.getElementById("TotalProducto");
			var sumaproducto =  parseFloat(TotProd.textContent);

	TotEnvio =	document.getElementById("TotalEnvio");
			var sumaenvio =  parseFloat(TotEnvio.textContent);

	TotalProducto = sumaproducto + sumaenvio;
	
	document.getElementById("TotalPedido").innerHTML =	TotalProducto;	

}

function calcular(change,kg,row,precio,costo )
{	// valor: cantidad de kilos.
	//PrecioVal: precio del producto.
	
	/* Desde el secelt kg
		-valor: cantidad de kilos.
		-PrecioVal: precio del producto. */

	/* Desde el select producto.
		-valor: precio del producto. 	*/
	
	if(change == 'producto') /*********** sI CAMBIAMOS LO PRODUCTOS */
	{
		var kilos = "SelectKg"+row;
		var getKilo  = document.getElementById(kilos); // getElementsByClassName(kilos);
		var PrecioVal = getKilo.value;
		var PrecioFinal =	PrecioVal *  precio;
		var CostoFinal = PrecioVal *  costo; 
		
		//alert(PrecioFinal);
	}
	else if(change == 'kilos') /*********** sI CAMBIAMOS  EL PESO */
	{
		// verificamos el valor del producto si no esta vacio;
		if(document.getElementById("productos"+row).value != 0)
		{
			/* Sacamos el Costo del producto */
			var elprecio = "precio"+row;
			var getPrecio = document.getElementById(elprecio);
			var PrecioVal   = getPrecio.value;
			
			/* Sacamos el Costo de Envio del producto */
			var elenvio = "envio"+row;
			var getEnvio = document.getElementById(elenvio);
			var CostoEnvio = getEnvio.value;
			
		}
		else
		{
			var CostoEnvio = 0;
			var PrecioVal  = 0;
		}
		
		var CostoFinal =	CostoEnvio * kg;
		var PrecioFinal =	PrecioVal * kg;
		//alert(PrecioFinal);
	}
	
	/*Quitamos Decimales*/
		var original=parseFloat(PrecioFinal);
		var PrecioFinal=Math.round(original*100)/100 ;
		/*#### Calcula el total de productos */
		
		/*Adormamos la tantidad*/
		PrecioFinal += '';
		x = PrecioFinal.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		
		/*Copiamos y sobre escribimos el valor */
		var Newid = "CostoProducto"+row;
		var theDiv = document.getElementById(Newid);
		//theDiv.removeChild(firstChild);
		limpiarDiv(Newid);							/* <--- */
		theDiv.innerHTML= "$ "+ x1 + x2 ; 
		
		calculaPrecioProducto(PrecioFinal,row);		/* <--- */

			
	/*Quitamos Decimales*/
		var costoriginal=parseFloat(CostoFinal);
		var CostoFinal=Math.round(costoriginal*100)/100 ;
		/*Adormamos la tantidad*/
		CostoFinal += '';
		x = CostoFinal.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		/*Copiamos y sobre escribimos el valor */
		var Idenvio = "CostoEnvio"+row;
		var ElidEnvio = document.getElementById(Idenvio);
		//theDiv.removeChild(firstChild);
		limpiarDiv(Idenvio);						/* <--- */
		//ElidEnvio.innerHTML= "$ "+ x1 + x2 ; 
		ElidEnvio.innerHTML= "$ "+CostoFinal; 
		
		calculaPrecioEnvio(CostoFinal,row);

		CalculaTotalPedido();

	//var cantidad = document.getElementsByClassName("SelectKg"+row).value;
}


