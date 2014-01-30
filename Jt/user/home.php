<?php  session_start(); 

 if(empty($_SESSION['Usuario'])) 
 {
	 header('location: index.php');
 } 
	include "../Connections/conexion.php"; 

				echo $_SESSION["Id"];
				echo $_SESSION["Id_destino"];


 ?>
        
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Jt Carnes</title>
		<link type="text/css" rel="stylesheet" href="../index.css">
        <script src="../js/jquery.js"> </script>
        <script src="../js/index.js"> </script>
        <script src="home.js"></script>
        <script> var NumeroDeProducto = 1;
        	
    </script>
    </head>

    <body>
        <div class="LogoBanner">
                <img src="../Imagenes/JTCarnes-Logo.png" width="396" height="72" />
                <span class="Titulo1">Ordenes de Pedido </span>
                <span class="subtitulo"><a href="" >Cambiar Contraseña </a> | <a href="../logout.php"> Cerrar Sesión </a> </span>
        </div>
        <div id="contenido">
        	<div class="DatosAccion">
            	<a class="btn" href="precios.php"> Ver precios </a>
                
                <div id="Datos">
                	<?php  echo $_SESSION["Empresa"]." <br/> ";
							$date_query = "SELECT * FROM salidas WHERE Id_destino ='".$_SESSION["Id_destino"]."' & Estatus = 'proxima' ORDER BY Fecha_salida ASC ";
							$resulta = mysql_query($date_query, $conexion) or die(mysql_error());
							
						   echo $númeroDeDias = intval(date("t",$mes));
	

							if (mysql_num_rows($resulta) > 0)
							{	 
								while ($fila = mysql_fetch_assoc($resulta))
								{
									//$fieldnames[] = $fila['Field']; //print_r($fila);
									//$fieldnames[] = $fila;
									//echo "Fecha de salida: ".$fila["Fecha_salida"]."";
									
				
									$pieces = explode("-", $fila["Fecha_salida"]);
									$año = $pieces[0];  $mes = $pieces[1]; $dia = $pieces[2]; 
									//return(strtotime($fecha1) > strtotime($fecha2));
									//echo date("d")+ 5; 
									
								
									
									if(date("m") == $mes && ($dia + 5 ) )
									{
											if((date("d")+ 5 ) <= $dia)
											{
												echo "la fecha es menor a 5 dias de la salida";
												
											}
										
										
									}
									
								}
							}	
							
						   
					 ?>
                </div>
            
            </div>
            <form  id="formto" action="home-pedido-detalle.php" method="post" enctype="multipart/form-data" > 
            <?php
			$result= mysql_query("SELECT * FROM productos ");
			
			echo '<div id="ObtenProductoBase" >';
			
			
			echo '<select class="SelectProductoBase"  name="productos1" onChange="showUser(this.value, 1)"><option selected="selected" value="0">Seleccione Uno</option>';			
			if (mysql_num_rows($result) > 0)
			{	 
				while ($fila = mysql_fetch_assoc($result))
				{
					 //$fieldnames[] = $fila['Field']; //print_r($fila);
						 $fieldnames[] = $fila;
					echo '<option value="'.$fila["Id"].'-'.$fila["Precio"].'-'.$fila["Envio"].'">'.$fila["Nombre"].'</option>'; 
				}
			}		
			 echo '</select></div>';
			?>
            
            <table class="TablaPedidos"  cellpadding="0" border="0" cellspacing="0">
              <tr class="fila-base" >
              	<!--<th>&nbsp;</th>-->
                <th>Tipo de producto</th>
                <th style="width: 300px;"> Cantidad</th>
                <th style="width: 300px;"> Gramaje</th>
                <th style="width: 300px;">Alto vacío</th>
                <th>Costo por Kilo</th>
                <th>Costo Producto</th>
                <th>Costo Envío</th>
               <th style="width: 132px;">&nbsp;</th>
              </tr>
              <tr>
              	<!-- <td> 1 </td> -->
               
                <td> 
                	 <input  class="LosProductos" type="hidden"  value="1" />
                	 <select id="productos1" class="SelectProducto"  name="productos1" onChange="showUser(this.value, 1)">
                   	 <option value="0" selected="selected"  >Seleccione Uno</option>
                    <?php 
						$result= mysql_query("SELECT * FROM productos ");				
						if (mysql_num_rows($result) > 0)
						 {	 
							while ($fila = mysql_fetch_assoc($result))
							{
								//$fieldnames[] = $fila['Field']; //print_r($fila);
								$fieldnames[] = $fila;
								echo '<option value="'.$fila["Id"].'-'.$fila["Precio"].'-'.$fila["Envio"].'">'.$fila["Nombre"].'</option>'; 
									/* foreach($fila as $x=>$x_value)
									   {
										 echo '<option value="'.$fila["Id"].'">'.$fila["Nombre"].'</option>';   
										 if($x == "Nombre")
										 {  
											echo '<option value="'.$x_value.'">'.$x_value.'</option>';  
										 }
										
									   }	*/
	
							 }
						  }			

						 ?>

                    </select>
                    
                </td>
                <td>
                	<select name="kilogramos1" id="SelectKg1" onChange="calcular('kilos',this.value,1,0,0 )" >
                    	<option  value="0"> Kg. </option>
                    	<?php 
						$i=5;
						while ($i <= 100)
						{
							echo '<option value="'.$i.'">'.$i.' Kg.</option>';
							$i= $i + 5 ;
						}
						?>
                  	
                    </select>
                </td>
                <td>
                	<select name="gramaje1" class="SelectGr1" >
                    	<option  value="0"> Gr. </option>
                        <?php 
						$i=50;
						while ($i <= 1000)
						{
							echo '<option value="'.$i.'">'.$i.' Gr.</option>';
							$i= $i + 50 ;
						}
						?>
                    </select>
                </td>
                <td><input type="checkbox" name="Altovacio1" /> </td>
                <td><div id="txtHint1">$</div></td>
                <td id="CostoProducto1">$</td>
                <td id="CostoEnvio1">$</td>
                <td class="elimina"><img class="Eliminar" src="../imagenes/eliminar.png"></td>
              </tr>
            </table>
            <input type="hidden" name="ArchivoBase" value="pedidos" />

        	<a id="ProductoNuevo" class="btn btnW" > AGREGAR PRODUCTO </a>
            
            <div style="clear:both"></div>
            
            <div style="float:right">
            	<table id="Totales" cellspacing="0">
                	<tr>
                    	<td class="primer"> Total producto </td>
                        <td >$ <span id="TotalProducto"></span>  </td>
                    </tr>
                    <tr>
                    	<td class="primer"> Total envío </td>
                       <td>$ <span id="TotalEnvio"></span>  </td>
                    </tr>
                    <tr>
                    	<td class="primer"> Total pedido </td>
                        <td>$ <span id="TotalPedido"></span>  </td>
                    </tr>
                </table>
                <a id="enviar" class="btn btnE" href="#"> ENVÍAR PEDIDO </a>
                <button>Enviar Pedido</button>
                
            </div>
            </form>
        </div>

    </body>
</html>

  
