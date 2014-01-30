<?php  session_start(); ?>

    <?PHP  if(empty($_SESSION['Usuario'])) {
			 header('location: index.php');
		}  ?>
        
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- InstanceBeginEditable name="doctitle" -->
        <title>Productos Detalle</title>
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
          
          
          
          
          
            <!-- InstanceEndEditable -->
    </body>
<!-- InstanceEnd --></html>

  
