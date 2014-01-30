<?php 

 require "Connections/conexion.php";
	

if($_POST){

	
	$BaseTable = $_POST["ArchivoBase"];

	 #BENGINNAME
 
	$resulta2 = mysql_query("SHOW COLUMNS FROM ".$BaseTable."") or die(mysql_error("favor de verificar Base de datos: ERROR 4589#O_#3  No Existe ".$BaseTable." "));
	
	#ENDGETNAME



	######################### EDITAR ################################
	
	#Editar Producto.#	
	if($_POST["action"]== 'edit')
	{	
		// "<pre>".print_r($_POST)."</pre>"; 
		 
		if (mysql_num_rows($resulta2) > 0)
		 {
			
			$update_mysql = "UPDATE ".$BaseTable." SET";
			
			while ($fila = mysql_fetch_assoc($resulta2)) {
				
					$fieldnames[] = $fila['Field'];
		
				}
		 }	
	
		
		echo "<pre>"; print_r($fieldnames); echo "</pre>";
		echo "<pre>"; print_r($_POST); echo "</pre>";

						
		//$fieldnames[] = $fila['Field']; 
			for($i=1; $i<mysql_num_rows($resulta2); $i++)
			{
				
					 // mysql_field_type($resulta2, $i)." este campo ".$fieldnames[$i]."<br >";
				
				if(isset($_POST[$fieldnames[$i]])){
					
					if($i == (mysql_num_rows($resulta2) - 1 ))
					{
						
						//$update_mysql.= " ". $fieldnames[$i]." = ".$_POST[$fieldnames[$i]];	//echo $fieldnames[$i];

							if(is_numeric($_POST[$fieldnames[$i]]))
							{
								$update_mysql.= " ". $fieldnames[$i]." = ".$_POST[$fieldnames[$i]];	//echo $fieldnames[$i];
							}
					
							else
							{
								$update_mysql.= " ". $fieldnames[$i]." = '".$_POST[$fieldnames[$i]]."'  " ;	//echo $fieldnames[$i];
							}
						
					}
					
					elseif($fieldnames[$i] == "Destino" || $fieldnames[$i] == "Id_destino") 
					{
						if(isset($_POST["Destino"])){
							$destinos = mysql_query("SELECT * FROM destinos WHERE Id = ".$_POST["Destino"]."")or die(mysql_error());
							$rowdet = mysql_fetch_array($destinos) or die(mysql_error());

							
							if ($fieldnames[$i] == "Destino")
							{
								$update_mysql.= " ". $fieldnames[$i]." = '".$rowdet["Ciudad"]."', ";
							}
							if ($fieldnames[$i] == "Id_destino")
							{
								if($_POST["Id_destino"]== "Ninguna" )
								{
									$update_mysql.= " ". $fieldnames[$i]." = 0 , ";
								}
								else
								{
									$update_mysql.= " ". $fieldnames[$i]." = '".$_POST["Destino"]."', ";
								}
							}
						}


					}
					elseif(is_numeric($_POST[$fieldnames[$i]]))
					{
						$update_mysql.= " ". $fieldnames[$i]." = ".$_POST[$fieldnames[$i]]. ", ";	//echo $fieldnames[$i];
					}
			
					else
					{
						$update_mysql.= " ". $fieldnames[$i]." = '".$_POST[$fieldnames[$i]]."', " ;	//echo $fieldnames[$i];
					}
					
				
				}
			}	
		
		$update_mysql.=" WHERE Id = ".$_POST["Id"]."";
		
		//echo $update_mysql;  return;		
		mysql_query($update_mysql)or die(mysql_error("No se puedo guardar la informacion."));	
		mysql_close($conexion);  
		header("Location: ".$BaseTable.".php");
		return;		
		/*
			* AQUI RETORNAMOS TODO #########################
		*/

		#----------------------------------------------	
	
		
		//print_r($fieldnames); foreach($fieldnames as $value => $x_value) {}
			
		$newarray = implode(", ", $fieldnames);  //print_r($newarray);
					
		//mysql_query("UPDATE productos SET Age=36 WHERE FirstName='Peter' AND LastName='Griffin'");
		
		
		$resultado = mysql_query('SELECT * FROM productos WHERE Id = "'.$_GET["edit"].'"', $conexion);
		$num_rows =	mysql_num_fields($resultado);
		
			for($I=0; $I< $num_rows; $I++)
			{
				echo mysql_field_name($resultado, $I) . "\n";
			}
	
	}
	
	######################### NUEVO ################################
	
	#Nuevo Producto.#
	if($_POST["action"]== 'new')
	
	{
	
	 	$insert_mysql = "INSERT INTO ".$BaseTable." ";
		
	 
		echo "<pre>"; 	
		print_r($_POST); 	
		echo "</pre> ";

		/*foreach($_POST as $pst => $pst_value)
			{*/

		/**		Para poder guardar la cuidad del usuario
		*/

		while ($fila = mysql_fetch_assoc($resulta2)) {
			
				$fieldnames[] = $fila['Field'];
				
			}

		for($i=1; $i<mysql_num_rows($resulta2); $i++){
			
			//echo mysql_field_type($resulta2, $i)." este campo ".$fieldnames[$i]."<br >";
			
			// echo  "campo #  ".$i ."  ".$_POST[$fieldnames[$i]]."<br>";

			if(isset($_POST[$fieldnames[$i]]))
			{
				$campos[] = $fieldnames[$i];

				if($fieldnames[$i] == "Id_destino" || $fieldnames[$i] == "Destino" )
				{
					if (!(empty($_POST["Destino"]))) 
					{
						if(is_numeric($_POST["Destino"]))
						{
							$destinos = mysql_query("SELECT * FROM destinos WHERE Id = ".$_POST["Destino"]."") or die(mysql_error());
							$rowdet = mysql_fetch_array($destinos);

							/*echo "<pre>"; print_r($rowdet); echo "</pre>"; 
							//echo $fieldnames[$i]."<br>";

							echo $rowdet["Id"];
							$valores[] = "'".$rowdet["Id"]."'";*/

							if($fieldnames[$i] == "Id_destino" )
							{	
								if($_POST["Id_destino"] == "Ninguna")
								{
									$valores[] = 0;
								}
								else
								{
									$valores[] = "'".$rowdet["Id"]."'";
								}
								
								

							}
							elseif($fieldnames[$i] == 'Destino' )
							{	
								echo $valores[] = "'".$rowdet["Ciudad"]."'";
							}
						}
						else
						{
							$valores[] = "'".$_POST[$fieldnames[$i]]."'";
						}


					}
					else
					{
						$valores[] = "''";
					}
				
				}
				elseif(is_numeric($_POST[$fieldnames[$i]]))
				{
					$valores[] = $_POST[$fieldnames[$i]];
				}
				else
				{
					$valores[] = "'".$_POST[$fieldnames[$i]]."'"; 
				}
			
			}
			
		}
			
		 $newarraycampos = implode(" , ", $campos);  
		 $newarrayvalores = implode(" , ", $valores); 
		 
		 
		 $insert_mysql .= "( ".$newarraycampos." ) ";
		 $insert_mysql .= "VALUES( ".$newarrayvalores." ) ";
		
		//echo $insert_mysql; return;
		 /*echo "<pre>"; 	print_r($campos); 	echo "</pre>";
		 echo "<pre>"; 	print_r($valores); 	echo "</pre>";*/
			
		//}
		mysql_query($insert_mysql, $conexion) or die(mysql_error()); 
		mysql_close($conexion);
		header("Location: ".$BaseTable.".php");
	
	}	 	



							

}
