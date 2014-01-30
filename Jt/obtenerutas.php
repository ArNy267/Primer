<?Php
include "Connections/conexion.php";

//$q = intval($_GET['q']);
//echo "esto es q  ".$q."<br>";

if($_GET['q'] != 'Ninguna'){

	$sql="SELECT * FROM destinos WHERE Ruta = '". $_GET['q']."'";
	
	$resEmp = mysql_query($sql, $conexion) or die(mysql_error());
	$totEmp = mysql_num_rows($resEmp);
	
									
				
			
			
echo '<select class="misciudades"  name="Destino">';

if($totEmp > 0)
{	
	while ($rowEmp = mysql_fetch_assoc($resEmp))
	{	
		if ($rowEmp['Ruta'] != 'Ninguna') {
			echo '<option value="'.$rowEmp['Id'].'">'.$rowEmp['Ciudad'].'</option>';								
		}
	}
}

echo '</select>';	

mysql_close($conexion);
}
?>