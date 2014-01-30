<?php  session_start(); ?>

    <?PHP  if(empty($_SESSION['Admin'])) {
			 header('location: index.php'); 
		}  ?>
        
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- InstanceBeginEditable name="doctitle" -->
        <title>Productos</title>
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
         
           <?php  require "Connections/conexion.php";  ?>
                     
            <br/>
            <form name="input" action="CRUD.php" method="POST">
            <table class="productos">
            	<tr>
                	<th>Clave</th> <th>Nombre</th> <th>Alto vacio</th>  <th>Granaje</th>  <th>Precio</th>
                </tr>
		<?php

						
			//$result= mysql_query("SELECT ".$newarray." FROM productos");
			
			#Accion Editar Registro
			if(isset($_GET["edit"]))
			{
				echo '<div style="position: absolute; left: 49px;top: 0px;" > <a href="productos.php"> 	VOLVER </a> </div>';
				echo '<input class="inpform" type="hidden" name="action" value="edit" />';
				echo '<input class="inpform" type="hidden" name="Id" value="'.$_GET["edit"].'" />';
				
				//echo "<a href='productos.php' >	VOLVER </a>";
								
				//echo "campo a editar ".$_GET['edit'];
				
				$result= mysql_query("SELECT * FROM productos WHERE Id='".$_GET['edit']."'");
				
				if (mysql_num_rows($result) > 0)
				 {	 
					while ($fila = mysql_fetch_assoc($result)) {
						 //$fieldnames[] = $fila['Field']; //print_r($fila);
						echo "<tr style='text-align:center'>";							
							 $fieldnames[] = $fila;
						 		
							 foreach($fila as $x=>$x_value)
							   {
								   
								   if($x == "Id")
								   {
									  echo "<td> " . $x_value . "</td>";
								   } 
								   
								    elseif($x == "Alto_vacio" || $x == "Gramaje" )
								   {
									 if($x_value=="on"){ $checked="checked";} else { $checked=""; }  	
									 echo '<td class="sip"><input name="'.$x.'" class="inpform" type="checkbox" '.$checked.'  /></td>';
									 
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
				$resultado2 = mysql_query("SHOW COLUMNS FROM productos");
				
				$result = mysql_query("SELECT * FROM productos ORDER BY Id DESC");
				$row = mysql_fetch_array($result);
				$lastId =  $row["Id"] + 1;
																
				if (mysql_num_rows($resultado2) > 0)
				 {
					while ($fila = mysql_fetch_array($resultado2)) {
						$fieldnames[] = $fila['Field']; //print_r($fila);
						
					}
					
					foreach($fieldnames as $x=>$x_value)
					   {
						   if($x == "Id")
						   {
							  echo "<td> " . $lastId . "</td>";
						   } 
					elseif($x_value == "Alto_vacio" || $x_value == "Cantidad" || $x_value == "Gramaje")
						   {
							  echo '<td class="sip"><input name="'.$x_value.'" class="inpform" type="checkbox"  /></td>';
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
				
				
				
				echo '<div style="position: absolute; left: 49px;top: 0px;" > <a href="productos.php"> 	VOLVER </a> </div>';
				echo '<input class="inpform" type="hidden" name="action" value="new" />';
				//echo '<input class="inpform" type="hidden" name="Id" value="'.$_GET["edit"].'" />';
				
				echo '<tr> <td colspan="6"><input type="submit" value="Guardar" ></td></tr>';
			} #EDD- Accion Editar Registro
			
			else
			{
				echo '<input class="inpform" type="hidden" name="action" value="" />';
				echo '<div style="position: absolute; right: 49px;top: 0px;" > <a href="productos.php?new"> AGREGAR </a> </div>';
				$result= mysql_query("SELECT * FROM productos");
				//$row = mysql_fetch_array($result);  echo "<br /> Este es el campo  ".$row["Nombre"];
				$i=1;
				
				if (mysql_num_rows($result) > 0)
				 {
					while ($fila = mysql_fetch_assoc($result)) {
						 //$fieldnames[] = $fila['Field']; //print_r($fila);
						 //echo "aumenta ".$i."<br/>";
					     
						 $resto = $i%2; 
						   if ($resto== 1) { 
								$clase="myclase";  //echo " numero par".$resto;
						   }else{
							   	$clase="myclase2";
							   }						
						
						echo "<tr class=".$clase." style='text-align:center'>";							
							 $fieldnames[] = $fila;
						 
							 foreach($fila as $x=>$x_value)
							   {
								   
								   if($x == "Id")
								   {
									  echo "<td><a href='productos.php?edit=".$x_value."'> " . $x_value . "</a></td>";
								   } 
								   else 
								   {
									   if($x_value == 'on')
									   {
											echo "<td> <img width='18px' src='imagenes/apply_f2.png' /> </td>";   
										}
									
																		
										else
										{
											echo "<td> " . $x_value . "</td>";
										}	
									// echo "<td> ".$x." " . $x_value . "</td>";
									   
								   }
							   }
							   
						 echo "</tr>";
						 
						 $i++;
						 
						}
				  }
				
				
			}
			
			
			
		 mysql_close($conexion);
						
			//SELECT * FROM myTable WHERE title IN ($newarray);
			
		?>	
			</table>	   
         	
		 </form >

         </div>
         
            <!-- InstanceEndEditable -->
    </body>
<!-- InstanceEnd --></html>

  
