<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion = "localhost";
$database_conexion = "jtcarnes_pedidos";
$username_conexion = "jtcarnes_admin";
$password_conexion = "haco7412";
$conexion = mysql_pconnect($hostname_conexion, $username_conexion, $password_conexion) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($database_conexion, $conexion);

mysql_query ("SET NAMES 'utf8'");

?>