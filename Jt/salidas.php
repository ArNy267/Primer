<?php  session_start(); ?>

    <?PHP  if(empty($_SESSION['Admin'])) {
			 header('location: index.php'); 
		}  ?>
        
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
        <title>JT Carnes</title>
        <link rel="stylesheet" type="text/css" href="calendario/css/default.css" />
		<link rel="stylesheet" type="text/css" href="calendario/css/jquery-ui-1.7.2.custom.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<!-- 		<script type="text/javascript" src="calendario-jquery/calendario_dw/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="calendario-jquery/calendario_dw/calendario_dw.js"></script> -->
		<link type="text/css" rel="stylesheet" href="index.css">

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
            	<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
        });
    </script>
           
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
                        
                        if ($value == "Fecha_salida") {
                            echo "<th> fecha de salida </th>";
                        } 
                        elseif($value == "Id")
                        {
                            echo "<th> Clave </th>"; # code...
                        }
                        elseif($value == "Id_destino")
                        {
                             echo "<th> Ruta </th>"; # code...
                        }
                        elseif ($value != "Estatus") 
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
                            echo '<div style="position: absolute; left: 49px;top: 0px;" > <a href="'.$base.'.php">  VOLVER </a> </div>';
                            echo '<input class="inpform" type="hidden" name="action" value="edit" />';
                            echo '<input class="inpform" type="hidden" name="Id" value="'.$_GET["edit"].'" />';
                            
                            //echo "<a href='productos.php' >   VOLVER </a>";
                                            
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

                                               elseif ($x == "Fecha_salida") 
                                               {    
                                                    echo '<td><input type="text" name="Fecha_salida"  id="datepicker" readonly="readonly" size="12" value="'.$x_value.'" /></td>';
                                              
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
                                                
                                                
                                               elseif($x != "Estatus")
                                                {
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

                                    elseif ($x_value == "Fecha_salida") 
                                       {    
                                          echo ' <td><input type="text" name="Fecha_salida"  id="datepicker" readonly="readonly" size="12" /></td>';
                                  
                                    }

                                    elseif ($x_value == "Id_destino") 
                                    {

                                        echo '<td id="trutas">
                                              <select class="misrutas" id="rutas" name="'.$x_value.'" >';
                                         /* echo '<select class="misrutas" id="rutas" name="'.$x_value.'" onchange="showDir(this.value)">
                                             <option value="Ninguna" selected="selected" > Ninguna </option>';*/
                                                    
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
                                       elseif ($x_value == "Estatus")
                                        { 

                                            echo '<td class="sip"><input name="pendiente" class="inpform" type="hidden"  /></td>';

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
                            
                            echo '<div style="position: absolute; left: 49px;top: 0px;" > <a href="'.$base.'.php">  VOLVER </a> </div>';
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
                                       
                                       if ($x == "Fecha_destino") 
                                       {    
                                          echo ' <input type="text" name="datepicker" id="datepicker" readonly="readonly" size="12" />';

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
                     mysql_close($conexion);    //SELECT * FROM myTable WHERE title IN ($newarray);
                        
                    ?>  
                </table>       
            </form >
        </div>
           
           
           

    </body>
</html>

  
