<?php 

 require "Connections/conexion.php";

 #BENGINNAME
 
	$resulta2 = mysql_query("SHOW COLUMNS FROM destinos");
	if (!$resulta2)
	{
		echo 'No se pudo ejecutar la consulta: ' . mysql_error(); exit;
	}

	 mysql_num_rows($resulta2); 
	
#ENDGETNAME	

if($_POST){
	
	
	######################### EDITAR ################################
	
	#Editar Producto.#	
	if($_POST["action"]== 'edit')
	{	
		// "<pre>".print_r($_POST)."</pre>"; 
		 
		if (mysql_num_rows($resulta2) > 0)
		 {
			
			$update_mysql = "UPDATE destinos SET";
			
			while ($fila = mysql_fetch_assoc($resulta2)) {
				
					$fieldnames[] = $fila['Field'];
		
				}
		 }	
	
		
		//"<pre>".print_r($fieldnames)."</pre>";
	
						
		//$fieldnames[] = $fila['Field']; 
			for($i=1; $i<mysql_num_rows($resulta2); $i++){
				
					  mysql_field_type($resulta2, $i)." este campo ".$fieldnames[$i]."<br >";
				
					
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
				elseif(is_numeric($_POST[$fieldnames[$i]]))
				{
					$update_mysql.= " ". $fieldnames[$i]." = ".$_POST[$fieldnames[$i]]. ", ";	//echo $fieldnames[$i];
				}
		
				else
				{
					$update_mysql.= " ". $fieldnames[$i]." = '".$_POST[$fieldnames[$i]]."', " ;	//echo $fieldnames[$i];
				}
					
				
			}	
		
		 $update_mysql.=" WHERE Id = ".$_POST["Id"]."";
		
		$update_mysql;  		
		mysql_query($update_mysql)or die(mysql_error("No se puedo guardar la informacion."));	
		mysql_close($conexion);
		header("Location: Rutas.php");
				
		/*
			* AQUI RETORNAMOS TODO #########################
		*/

		#----------------------------------------------	
	
		
			//print_r($fieldnames); foreach($fieldnames as $value => $x_value) {}
			
		$newarray = implode(", ", $fieldnames);  //print_r($newarray);
		
		echo "separados por coma ".$newarray;
		
	
		
		echo "UPDATE productos SET Age=36 	WHERE Id = '".$_POST['id']."'";
		
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
	
	 	$insert_mysql = "INSERT INTO destinos ";
		
	 
			//echo "<pre>"; 	print_r($_POST); 	echo "</pre>";

		/*foreach($_POST as $pst => $pst_value)
			{*/

		while ($fila = mysql_fetch_assoc($resulta2)) {
			
				$fieldnames[] = $fila['Field'];
	
			}

		for($i=1; $i<mysql_num_rows($resulta2); $i++){
			
			//echo mysql_field_type($resulta2, $i)." este campo ".$fieldnames[$i]."<br >";
			
			if(isset($_POST[$fieldnames[$i]]))
			{
				$campos[] = $fieldnames[$i];
				
				if(is_numeric($_POST[$fieldnames[$i]]))
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

		 
		 //$insert_mysql;
		
		 /*echo "<pre>"; 	print_r($campos); 	echo "</pre>";
		 echo "<pre>"; 	print_r($valores); 	echo "</pre>";*/
			
		//}
		
		//echo $insert_mysql; return;	
		
		//foreach($fieldnames as $value => $x_value){}
		
		mysql_query($insert_mysql, $conexion) or die(mysql_error()); 
		mysql_close($conexion);
		header("Location: rutas.php");
	
	}	 	



							

}
