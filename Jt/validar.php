<?php   session_start();

$user= $_POST["usuario"];
$pass= $_POST["contrasenia"];

/*Incluimos el fichero de la clase*/
require 'conexiones/Db.class.php';

/*Creamos la instancia del objeto. Ya estamos conectados*/
//$bd=Db::getInstance();

	/* Creamos una query sencilla
		$sql='SELECT NOMBRE FROM clientes';

	 #Ejecutamos la query
		$stmt=$bd->ejecutar($sql);

	#Realizamos un bucle para ir obteniendo los resultados
	 	while ($x=$bd->obtener_fila($stmt,0)){

	 	  echo $x['NOMBRE'].'<br />';

	 } 


	$sql2  = 'SELECT * FROM clientes';
	$stmt2 = $bd->ejecuta($sql2);
		
	

		while ($x = $bd->obtener_todo($stmt2,0)){

	 	  echo "<a href='detalle.php?".$x['clave'].">".$x['clave']."</a>".$x['NOMBRE'].'<br />';

	} */


/*
function conextar(){
	
   $servidor='localhost';
   $usuario='developer';
   $password='haco7412';
   $base_datos='jtcarner_pedidos';
	
	
	
	} */

include("Connections/conexion.php");

mysql_select_db($database_conexion, $conexion);
$query_Consulta = "SELECT * FROM clientes";

$Consulta = mysql_query($query_Consulta, $conexion) or die(mysql_error());
$row_Consulta = mysql_fetch_assoc($Consulta);
$totalRows_Consulta = mysql_num_rows($Consulta);

do { 
 echo $row_Consulta["Nombre"];
} while ($row_Consulta = mysql_fetch_assoc($Consulta)); 
?>
