<?php  session_start(); ?>

    <?PHP  if(empty($_SESSION['Admin'])) {
			 header('location: index.php'); 
		}  ?>
        
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- InstanceBeginEditable name="doctitle" -->
        <title>Untitled Document</title>
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
	           		
	           		/**
					 DEfinimos la accion 
					*/

	           		$uri = basename($_SERVER['PHP_SELF']);
					$pieces = explode('.', $uri);
					$base = $pieces[0];  // en dado caso que se a diferente hay que cambiar aqui.

					$detalles = $base."-detalle.php";
			   
			  		$result= mysql_query("SELECT * FROM  ".$base."" );
					//$row = mysql_fetch_array($result);  //echo "<br /> Este es el campo  ".$row["Nombre"];



			    /* Campos de la tabla*/
				   $resulta2 = mysql_query("SHOW COLUMNS FROM ".$base."") or die(mysql_error("favor de verificar Base de datos: ERROR 4589#O_#3  No Existe ".$base." "));
				   while ($fila = mysql_fetch_assoc($resulta2)) {
				
						$fieldnames[] = $fila['Field'];
			
					}	
			   /* END Campos de la tabla*/	
				
				# Si no tenemos registros. 
				if (mysql_num_rows($result) > 0 || isset($_GET["edit"]) || isset($_GET["new"]))
				{ 	

				/* Agregar Tabla de destinos */
				    // $queEmp = "SELECT * FROM ".$base." ";
			   	
				   	if(isset($_GET["edit"]))
				   	{

				   		
				   	}	

					/* Para Obtener Las Rutas */
			   		$queEmp = "SELECT * FROM destinos  GROUP BY Ruta ";
					$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
					$totEmp = mysql_num_rows($resEmp);	

					
			   /* END Agregar Tabla de destinos */	
		  			  		
				  ?>
	                     
	            <br/>
	            <form name="input" action="<?php echo $detalles ?>" method="POST">
		            <table class="productos">
		            	<tr>
		                	<!--  <th>Clave</th> <th>Estado</th> <th>Ciudad</th>    <th>Costo</th> <th>Ruta</th> -->
		                
				<?php
					foreach ($fieldnames as $key => $value) {
						
						if ($value == "Id_destino") {
							echo "<th> Ruta </th>";
						} 
						elseif($value == "Id")
						{
							echo "<th> Clave </th>"; # code...
						}
						else
						{
							echo "<th> ".$value." </th>"; # code...
						}

						
					}
				
				  echo "</tr>";
				} ########  Aqui se termina los titulos o cabeseras del form y tabla;
					

					
						//$result= mysql_query("SELECT ".$newarray." FROM productos");
						
						/**
						  Editamos el registro 
						*/
						if(isset($_GET["edit"]))
						{
							echo '<div style="position: absolute; left: 49px;top: 0px;" > <a href="'.$base.'.php"> 	VOLVER </a> </div>';
							echo '<input class="inpform" type="hidden" name="action" value="edit" />';
							echo '<input class="inpform" type="hidden" name="Id" value="'.$_GET["edit"].'" />';
							
							//echo "<a href='productos.php' >	VOLVER </a>";
											
							$result= mysql_query("SELECT * FROM ".$base." WHERE Id='".$_GET['edit']."'");
							
							if (mysql_num_rows($result) > 0)
							 {	 
								while ($fila = mysql_fetch_assoc($result)) {
									 //$fieldnames[] = $fila['Field']; //print_r($fila);
							  echo "<tr style='text-align:center'>";							
										 $fieldnames[] = $fila;

									 	#para verificar el tipo de dato a modificar.#	
										 foreach($fila as $x=>$x_value) 
										   {
											   //echo " aqui tenemos el campo ".$x." con su valor ".$x_value."<br>";

											   if($x == "Id")
												{
													echo "<td> " . $x_value . "</td>";
												}
												elseif ($x == "Id_destino") 
												{

													echo '<td id="trutas">';
													echo '<select class="misrutas" id="rutas" name="'.$x.'" onchange="showDir(this.value)">';	
			   										if($x_value != 0){

			   											$destinos = mysql_query("SELECT * FROM destinos WHERE Id = ".$x_value."");
			   											$rowdet = mysql_fetch_array($destinos) or die(mysql_error());	
			   											$condicion= 'WHERE Ruta ="'.$rowdet["Ruta"].'"';
			   										}
			   										else
			   										{
			   											$destinos = mysql_query("SELECT * FROM destinos");
			   											$condicion= "";
			   										}
											   		
		
													if($totEmp> 0)
													{
														while ($rowEmp = mysql_fetch_assoc($resEmp))
														{	

															if($rowEmp['Ruta'] == $rowdet["Ruta"])
															{
																echo '<option value="'.$rowEmp['Ruta'].'" selected="selected">'.$rowEmp['Ruta'].'</option>';
															}
															else
															{
																echo '<option value="'.$rowEmp['Ruta'].'" >'.$rowEmp['Ruta'].'</option>';
															}

														}
												   	}          

													echo '</select></td> ';	
												   	//echo '<td ><input name="'.$x_value.'" class="inpform" type="checkbox"  /></td>';

											    }
											    elseif ($x == "Destino")
											    {
											    	
											    	echo '<td class="sip"> <div id="txtHint">';
											    	echo '<select name="Destino" class="misciudades">';
											    	
											    	$query_edit  = "SELECT * FROM destinos ".$condicion." " ;
											   		$res_query = mysql_query($query_edit , $conexion) or die(mysql_error());
													$tot_query = mysql_num_rows($res_query);

													//echo $rowdet['Ruta']; 

											   		if($tot_query> 0)
													{
														while ($row_query = mysql_fetch_assoc($res_query))
														{
															if($row_query["Ciudad"] == $x_value){

																echo '<option value="'.$row_query["Id"].'" selected="selected">'.$row_query["Ciudad"].'</option>';
															}
															else
															{
																echo '<option value="'.$row_query["Id"].'">'.$row_query["Ciudad"].'</option>';
															}	
															
														}
													} 

											  	 	echo '
											   			</select></div>
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
						
						/**
						  Nuevo el registro 
						*/	
						elseif(isset($_GET["new"]))
						{ 
							#BENGINNAME
							// $resultado2 = mysql_query("SHOW COLUMNS FROM ".$base."") or die(mysql_error());

							// printf($resultado2);
							
							$result = mysql_query("SELECT * FROM ".$base." ORDER BY Id DESC");
							$row = mysql_fetch_array($result);
							$lastId =  $row["Id"] + 1;
																			
							if (mysql_num_rows($resulta2) > 0)
							 {
								/*while ($fila = mysql_fetch_array($resultado2)){
									$fieldnames[] = $fila['Field']; //print_r($fila);
									
								}
									echo "<pre>";
									 print_r($fila);
									echo "</pre>";
								*/

								foreach($fieldnames as $x=>$x_value)
								{
									
									//echo " campo ".$x_value;

									if($x_value == "Id")
									{
										echo "<td>".$lastId."</td>";
									}
									elseif ($x_value == "Id_destino") 
									{

										echo '<td id="trutas">
											  <select class="misrutas" id="rutas" name="'.$x_value.'" onchange="showDir(this.value)">
													<option value="Ninguna" selected="selected" > Ninguna </option>';
									
													
										if($totEmp> 0)
										{
											while ($rowEmp = mysql_fetch_assoc($resEmp))
											{
												if ($rowEmp['Ruta'] != 'Ninguna') {

													echo '<option value="'.$rowEmp['Ruta'].'" >'.$rowEmp['Ruta'].'</option>';								
												//echo $rowEmp['campo'];
												}
												
											}
										}          

										echo '</select></td> ';	
									   	//echo '<td ><input name="'.$x_value.'" class="inpform" type="checkbox"  /></td>';

									   }
									   elseif ($x_value == "Destino")
									   {
									   		echo '<td class="sip"> <div id="txtHint">';
									   		echo '<select name="Destino" class="misciudades">'; 
									  			
									  		$q_destinos = "SELECT * FROM destinos";
											$q_Emp = mysql_query($q_destinos, $conexion) or die(mysql_error());
											$tot_q = mysql_num_rows($q_Emp);												
														
											if($tot_q> 0)
											{
												while ($row_q = mysql_fetch_assoc($q_Emp))
												{
													echo '<option value="'.$row_q['Id'].'" >'.$row_q['Ciudad'].'</option>';	
													
												}
											}          	

									   		echo '</selecte></div>
									   			 </td>';
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
							
							echo '<div style="position: absolute; left: 49px;top: 0px;" > <a href="'.$base.'.php"> 	VOLVER </a> </div>';
							echo '<input class="inpform" type="hidden" name="action" value="new" />';
							//echo '<input class="inpform" type="hidden" name="Id" value="'.$_GET["edit"].'" />';
							
							echo '<tr> <td colspan="6"><input type="submit" value="Guardar" ></td></tr>';
							
						} #EDD- Accion Agregar Registro
					
						/**
						  PAgina Principal  
						*/

						else
						{
							echo '<input class="inpform" type="hidden" name="action" value="" />';
							echo '<div style="position: absolute; right: 49px;top: 0px;" > <a href="'.$base.'.php?new"> AGREGAR </a> </div>';
							
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
									   // echo $x." y su valor = ".$x_value;   
									   
									   if ($x == "Id_destino") 
									   {
									   		if ($x_value == 0)
									   		{
												echo " <td> Ninguna </td> ";
											}
											else
											{
									   			$results = mysql_query("SELECT * FROM destinos WHERE Id = '".$x_value."'") or die(mysql_error());
												$row = mysql_fetch_array($results);

												echo "<td> " . $row["Ruta"] . "</td>";
									   		}
									   }
									   elseif ($x == "Id")
									   {
								  			 echo "<td> <a href='".$base.".php?edit=".$x_value."' > " . $x_value . "</a></td>";

									   }
									   else
									   {
									   		echo "<td> " . $x_value . "</td>";
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
					 echo "<input type='hidden' value='".$base."' name='ArchivoBase'  />";	 
					 mysql_close($conexion); 	//SELECT * FROM myTable WHERE title IN ($newarray);
						
					?>	
				</table>	   
		 	</form >
    	</div>
           
           
           
            <!-- InstanceEndEditable -->
    </body>
<!-- InstanceEnd --></html>

  
