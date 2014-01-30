<?php  session_start(); ?>

    <?PHP  if(empty($_SESSION['Admin'])) {
			 header('location: index.php'); 
		}  ?>
        
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- InstanceBeginEditable name="doctitle" -->
        <title>Rutas</title>
        <!-- InstanceEndEditable -->
<link type="text/css" rel="stylesheet" href="index.css">
        <script src="js/jquery.js"> </script>
        <script src="js/index.js"> </script>
        <!-- InstanceBeginEditable name="head" -->
        <!-- InstanceEndEditable -->
    </head>

    <body>
        <div class="LogoBanner">
                <img src="Imagenes/JTCarnes-Logo.png" width="396" height="72" />
                <span class="Titulo1">Ordenes de Pedido </span>
                <span class="subtitulo"><a href="" >Cambiar Contraseña </a> | <a href="logout.php"> Cerrar Sesión </a> </span>
        </div>
            <ul class="menu">
                <li><a href="pedidos.php">Pedidos en proceso</a></li>
                <li><a href="">Pedidos enviados</a></li>
                <li><a href="clientes.php">Agregar cliente</a></li>
                <li><a href="">Editar cliente</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="rutas.php">Rutas</a></li>
                <li><a href="salidas.php">Reportes</a></li>
            </ul>
            <!-- InstanceBeginEditable name="principal" -->
           
   		<div id="contenido">
         
           <?php  require "Connections/conexion.php";  

           		 $direccion =""; #clave global para direcciones.
		   
		   $result= mysql_query("SELECT * FROM destinos");
			//$row = mysql_fetch_array($result);  echo "<br /> Este es el campo  ".$row["Nombre"];

		   /* DESTINOS AGREGADOS*/
		    $queEmp = "SELECT * FROM destinos GROUP BY  Ruta ";
			$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
			$totEmp = mysql_num_rows($resEmp);
		   /* END DESTINOS AGREGADOS*/	
			
			# Si no tenemos registros. 
			if (mysql_num_rows($result) > 0 || isset($_GET["edit"]) || isset($_GET["new"]))
			{ 	
			 		//echo '<div style="position: absolute; right: 49px;top: 0px;" > <a href="rutas.php?new"> AGREGAR </a> </div>';
	  			  		
			  ?>
                     
            <br/>
            <form name="input" action="rutas-detalle.php" method="POST">
	            <table class="productos">
	            	<tr>
	                	 <th>Clave</th> <th>Estado</th> <th>Ciudad</th>    <th>Costo</th> <th>Ruta</th>
	                </tr>
			<?php

			} ########  Aqui se termina los titulos o cabeseras del form y tabla;
					
					
						//$result= mysql_query("SELECT ".$newarray." FROM productos");
						
						#Accion Editar Registro
						if(isset($_GET["edit"]))
						{
							echo '<div style="position: absolute; left: 49px;top: 0px;" > <a href="rutas.php"> 	VOLVER </a> </div>';
							echo '<input class="inpform" type="hidden" name="action" value="edit" />';
							echo '<input class="inpform" type="hidden" name="Id" value="'.$_GET["edit"].'" />';
							
							//echo "<a href='productos.php' >	VOLVER </a>";
											
							$result= mysql_query("SELECT * FROM destinos WHERE Id='".$_GET['edit']."'");
							
							if (mysql_num_rows($result) > 0)
							 {	 
								while ($fila = mysql_fetch_assoc($result)) {
									 //$fieldnames[] = $fila['Field']; //print_r($fila);
							  echo "<tr style='text-align:center'>";							
										 $fieldnames[] = $fila;
									 		
									 	#para verificar el tipo de dato a modificar.#	
										 foreach($fila as $x=>$x_value) 
										   {
											   
											   if($x == "Id")
											   {
												  echo "<td> " . $x_value . "</td>";
											   } 
											   											   
											   elseif($x == "Estado")
												   {
													  //echo "<td> " . $lastId . "</td>";
												   	  echo '<td><select name="Estado">';
												   	  											   	  
												   	  	$estados =array("Aguascalientes","Baja California","Baja California Sur","Campeche","Chiapas","Chihuahua",
												   	  					"Coahuila de Zaragoza","Colima","Distrito Federal","Durango","Guanajuato","Guerrero","Hidalgo","Jalisco",
												   	  					"Mexico","Michoacan de Ocampo","Morelos","Nayarit","Nuevo Leon","Oaxaca","Puebla","Queretaro de Arteaga",
												   	  					"Quintana Roo","San Luis Potosi","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz-Llave",
												   	  					"Yucatan","Zacatecas");
															
															//echo '<option value="'.$x_value .'">"'.$x_value .'"</option>';

												   	  	foreach ($estados as $key => $value) {

												   	  		if($x_value == $value){

												   	  			echo "<option value='".$value."' selected='selected'>  ".$value." </option> ";

												   	  		}
												   	  		else
												   	  		{
												   	  			echo "<option value='".$value."'>  ".$value." </option> ";
												   	  		}


												   	  	}
													  echo '</select></td>';	
												   } 
 
											   elseif($x == "Ruta")
											    {
											    	echo '<td id="trutas">
													  <select class="misrutas" id="rutas" name="Ruta">';

													  		echo '<option value="Ninguna" selected="selected" > Ninguna </option>';									
															
															if($totEmp> 0)
															{
																while ($rowEmp = mysql_fetch_assoc($resEmp))
																{
																	if ($rowEmp['Ruta'] != 'Ninguna') 
																	{
																		if($rowEmp['Ruta'] == $value)
																		{
																			echo '<option value="'.$rowEmp['Ruta'].'" selected="selected">'.$rowEmp['Ruta'].'</option>';
																		}
																		else
																		{
																			echo '<option value="'.$rowEmp['Ruta'].'" >'.$rowEmp['Ruta'].'</option>';
																		}								
																	//echo $rowEmp['campo'];
																	}
																
																	
																}
															}          

														echo '<option value="Nueva">Agregar Ruta Nueva</option>
															  </select>
																<span id="nuevaruta">
																	<input id="Otraruta" type="text" />
																	<a id="quitar" ><img  width="15px" src="imagenes/cancel_f2.png" /></a> 
																</span>
														
														</td>';
												}  
											   else 
											   {
												// echo "<td> ".$x." " . $x_value . "</td>";
												echo '<td class="sip"><input name="'.$x.'" class="inpform" type="text" value="'.$x_value.'" /></td>';
											   }



										   }
										   
									 echo "</tr>";
									}
							  }			
							echo '<tr> <td colspan="6"><input type="submit" value="Modificar" ></td></tr>';
						} #EDD- Accion Editar Registro
						
						elseif(isset($_GET["new"]))
						{ 
							#BENGINNAME
							$resultado2 = mysql_query("SHOW COLUMNS FROM destinos");
							
							$result = mysql_query("SELECT * FROM destinos ORDER BY Id DESC");
							$row = mysql_fetch_array($result);
							$lastId =  $row["Id"] + 1;
																			
							if (mysql_num_rows($resultado2) > 0)
							 {
								while ($fila = mysql_fetch_array($resultado2))
								{
									$fieldnames[] = $fila['Field']; //print_r($fila);
									
								}
								
								foreach($fieldnames as $x=>$x_value)
								{
									  								   
									if($x_value == "Id")
									{
										echo "<td>".$lastId."</td>";
									}
									   
									elseif($x_value == "Estado")
									{
										  //echo "<td> " . $lastId . "</td>";
									   	echo '<td><select name="Estado">';
												   	  											   	  
								   	  	$estados =array("Aguascalientes","Baja California","Baja California Sur","Campeche","Chiapas","Chihuahua",
								   	  					"Coahuila de Zaragoza","Colima","Distrito Federal","Durango","Guanajuato","Guerrero","Hidalgo","Jalisco",
								   	  					"Mexico","Michoacan de Ocampo","Morelos","Nayarit","Nuevo Leon","Oaxaca","Puebla","Queretaro de Arteaga",
								   	  					"Quintana Roo","San Luis Potosi","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz-Llave",
								   	  					"Yucatan","Zacatecas");

								   	  	foreach ($estados as $key => $value)
								   	  	{

											echo "<option value='".$value."'>  ".$value." </option> ";
										   	  	
										}

											  echo '</select></td>';	
	
									} 

									elseif ($x_value == "Ruta") 
									{
										echo '<td id="trutas">
											  <select class="misrutas" id="rutas" name="Ruta">
													<option value="Ninguna" selected="selected" > Ninguna </option>';									
													
													if($totEmp> 0)
													{
														while ($rowEmp = mysql_fetch_assoc($resEmp))
														{
															if ($rowEmp['Ruta'] != 'Ninguna') {

																echo '<option value="'.$rowEmp['Ruta'].'">'.$rowEmp['Ruta'].'</option>';								
															//echo $rowEmp['campo'];
															}
															
														}
													}          

												echo '<option value="Nueva">Agregar Ruta Nueva</option>
													  </select>
														<span id="nuevaruta">
															<input id="Otraruta" type="text" />
															<a id="quitar" ><img  width="15px" src="imagenes/cancel_f2.png" /></a> 
														</span>
												
												</td>';	
									   	//echo '<td ><input name="'.$x_value.'" class="inpform" type="checkbox"  /></td>';

									   }  
								
									   else
									   {
										 
										// echo "<td> ".$x." " . $x_value . "</td>";
										echo '<td class="sip"><input name="'.$x_value.'" class="inpform" type="text"  /></td>';
									   }
								   }
								
							}
							
							$newarray = implode(", ", $fieldnames);  //print_r($newarray);
							
							
							#ENDGETNAME
							
							echo '<div style="position: absolute; left: 49px;top: 0px;" > <a href="rutas.php"> 	VOLVER </a> </div>';
							echo '<input class="inpform" type="hidden" name="action" value="new" />';
							//echo '<input class="inpform" type="hidden" name="Id" value="'.$_GET["edit"].'" />';
							
							echo '<tr> <td colspan="6"><input type="submit" value="Guardar" ></td></tr>';
						} #EDD- Accion Agregar Registro
						
						else
						{
							echo '<input class="inpform" type="hidden" name="action" value="" />';
							echo '<div style="position: absolute; right: 49px;top: 0px;" > <a href="rutas.php?new"> AGREGAR </a> </div>';
							
							//$row = mysql_fetch_array($result);  echo "<br /> Este es el campo  ".$row["Nombre"];
							$i=1;
							
							if (mysql_num_rows($result) > 0)
							{
							
								while ($fila = mysql_fetch_assoc($result)) 
								{
								 //$fieldnames[] = $fila['Field']; //print_r($fila); 
							     
									$resto = $i%2; 

									if ($resto== 1)
									{ 
										$clase="myclase"; 
									}
									else
									{
									  	$clase="myclase2";
									}						
									
									echo "<tr class=".$clase." style='text-align:center'>";							
										 $fieldnames[] = $fila;

									foreach($fila as $x=>$x_value)
									{
											//echo $x." y su valor = ".$x_value;   
									   /*if($x == "Id")
									   {
										  echo "<td><a href='rutas.php?edit=".$x_value."'> " . $x_value . "</a></td>";
									   }*/ 
									   if ($x != "Id")
									   {

									   	echo "<td> " . $x_value . "</td>";

												// echo "<td> ".$x." " . $x_value . "</td>";
									   }
									   else
									   {
									   		echo "<td> <a href='Rutas.php?edit=".$x_value."' > " . $x_value . "</a></td>";
									   }

									}
										   
									echo "</tr>";
									 
									$i++;
								 
								}
								
							 } 
							  else
							 {
								 echo "<center><h2>No Exite ningun registro!</h2><center>";
							 }
						}
						 
					 mysql_close($conexion); 	//SELECT * FROM myTable WHERE title IN ($newarray);
						
					?>	
				</table>	   
		 	</form >
    	</div>
            <!-- InstanceEndEditable -->
    </body>
<!-- InstanceEnd --></html>

  
