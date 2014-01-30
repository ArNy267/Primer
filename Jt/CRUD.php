<?php 

 require "Connections/conexion.php";

 #BENGINNAME
 
	$resulta2 = mysql_query("SHOW COLUMNS FROM productos");
	if (!$resulta2)
	{
		echo 'No se pudo ejecutar la consulta: ' . mysql_error(); exit;
	}

	 mysql_num_rows($resulta2); 
	
#ENDGETNAME	

if($_POST){
	
	
	#Editar Producto.#	
	if($_POST["action"]== 'edit')
	{	
		// "<pre>".print_r($_POST)."</pre>"; 
		 
		if (mysql_num_rows($resulta2) > 0)
		 {
			
			$update_mysql = "UPDATE productos SET";
			
			while ($fila = mysql_fetch_assoc($resulta2)) {
				
					$fieldnames[] = $fila['Field'];
		
				}
		 }	
	
		
		//"<pre>".print_r($fieldnames)."</pre>";
	
						
		//$fieldnames[] = $fila['Field']; 
			for($i=1; $i<mysql_num_rows($resulta2); $i++){
				
					 mysql_field_type($resulta2, $i)." este campo ".$fieldnames[$i]."<br >";
				
					
				if($i == (mysql_num_rows($resulta2) - 1 && $fieldnames[$i] == "Precio" ))
				{
					
					$update_mysql.= " ". $fieldnames[$i]." = ".$_POST[$fieldnames[$i]];	//echo $fieldnames[$i];
					
				}
		
				else
				{
					$update_mysql.= " ". $fieldnames[$i]." = '".$_POST[$fieldnames[$i]]."' , " ;	//echo $fieldnames[$i];
				}
					
				
			}	
		
		 $update_mysql.=" WHERE Id = ".$_POST["Id"]."";
		
		 $update_mysql; 
		
		mysql_query($update_mysql);	
		mysql_close($conexion);
		header("Location: productos.php");
				
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
	
	
	#Nuevo Producto.#
	if($_POST["action"]== 'new')
	
	{
	
	 	$insert_mysql = "INSERT INTO productos ";
		
	 
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
		 
		
		 /*echo "<pre>"; 	print_r($campos); 	echo "</pre>";
		 echo "<pre>"; 	print_r($valores); 	echo "</pre>";*/
			
		//}
		
		//echo $insert_mysql; return;	
		
		//foreach($fieldnames as $value => $x_value){}
		
		mysql_query($insert_mysql, $conexion) or die(mysql_error());
		mysql_close($conexion);
		
		header("Location: productos.php");
	
	}	 	



							

}


##ESTO ES INDEPENDIENTE.......................

if($_GET){
#BEGINLESION
print_r($_POST); echo "<br />";
 	//var_dump($_POST);
 	$mipost[] = $_POST;
 	$datos = array_keys($_POST); 
 	print_r($datos);		echo "<br />";
 	//print_r(array_keys($_POST));

 		 $arrlength = count($_POST);

 	mysql_connect('localhost','root','');

	$result = mysql_db_query('LuisDuran',"SELECT * FROM clientes");
	//echo mysql_field_name($result, 0);

	$row = mysql_fetch_array($result);
	//echo $row["campo"];
 	
 	for ($i=0; $i < $arrlength ; $i++)
 	{ 

 		$mipost[$i] = $datos[$i];

 		if( $mipost[$i] == mysql_field_name($result, $i))
 		{
 			echo "<br> no coinsiden campos para comparar. <br>";
 		}
 		# code...
 	}

 	echo $mipost[1];

 	echo "<br><br><br><br>";
 	print("<pre>");
	print_r($_POST);
	print("</pre>"); 

	//print_r($mipost);

	foreach($_POST as $x=>$x_value)
   {
   echo "Key=" . $x . ", Value=" . $x_value;
   		
   		if($x == 'LuisDuran')
   		{
   			echo "usuario aceptado";

   			if($_POST[$x] == 'luis')
   			{
   				echo "Contraseña equivocada";
   			}
   		}

   echo "<br>";
   }
#ENDLESION


	if(isset($_GET["edit"]))
	 { 
			
		mysql_query("UPDATE Persons SET Age=36 WHERE FirstName='Peter' AND LastName='Griffin'");
		
		
		
		echo $_GET['edit'];
		
		$resultado = mysql_query('SELECT * FROM productos WHERE Id = "'.$_GET["edit"].'"', $conexion);
		$num_rows =	mysql_num_fields($resultado);
		
		for($I=0; $I< $num_rows; $I++)
		{
			echo mysql_field_name($resultado, $I) . "\n";
		}
		
		
		mysqli_close($con);
	
	 }
	
	
	 if(isset($_GET["new"]))
	 { 
 	

 }




}
				
 
 
 

?>