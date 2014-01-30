<?php  session_start(); ?>

    <?PHP  if(empty($_SESSION['Admin'])) {
			
			 header('location: index.php'); 
		}  ?>
         
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- TemplateBeginEditable name="doctitle" -->
        <title>Jt Carnes</title>
        <!-- TemplateEndEditable -->
<link type="text/css" rel="stylesheet" href="../index.css">
        <script src="../js/jquery.js"> </script>
        <script src="../js/index.js"> </script>
        <!-- TemplateBeginEditable name="head" -->
        <!-- TemplateEndEditable -->
    </head>

    <body>
        <div class="LogoBanner">
                <img src="../Imagenes/JTCarnes-Logo.png" width="396" height="72" />
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
            <!-- TemplateBeginEditable name="principal" -->
            <table class="tablainicio">
              <tr>
                <th></th>
                <th>Cliente</th>
                <th>No. Pedido</th>
                <th>Fecha de pedido</th>
                <th>Fecha de salida</th>
                <th></th>
              </tr>
              <tr>
                <td>1</td>
                <td>ALTIPA S.A. de C.V. </td>
                <td>254789</td>
                <td>2011-10-06 09:09:49</td>
                <td>2011-26-06</td>
                <td><img src=""></td>
              </tr>
            </table>
            <!-- TemplateEndEditable -->
    </body>
</html>

  
