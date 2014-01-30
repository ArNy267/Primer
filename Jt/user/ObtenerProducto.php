<?php
$q = intval($_GET['q']);

$r = $_GET['r'];

include "../connections/conexion.php";

$sql= "SELECT * FROM productos WHERE Id = '".$q."'";
$result = mysql_query($sql) or die (mysql_error());

while($row = mysql_fetch_array($result))
  {
	  
  echo '<input type="hidden" id="nombre'.$r.'" name="nombre'.$r.'" value="'.$row['Nombre'].'"  readonly/>';
  echo '<input type="hidden" id="precio'.$r.'" name="precio'.$r.'" value="'.$row['Precio'].'" readonly />';
  echo '<input type="hidden" id="envio'.$r.'" name="envio'.$r.'" value="'.$row['Envio'].'" readonly />';
  echo "$ ".$row['Precio'];
  }

mysql_close($conexion);

?> 