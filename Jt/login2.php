<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Untitled Document</title>
        <link type="text/css" rel="stylesheet" href="index.css">
        <script src="js/jquery.js"> </script>
    </head>
    <style type="text/css">

    .login{ font-family:	Georgia, "Times New Roman", Times, serif;
			margin:50px auto; width:500px;
		 }

    </style>
    <body>

    <?PHP  if($_POST){
			
			include "validar.php";
		
			}  ?>
    	<div class="LogoBanner">
                <img src="Imagenes/JTCarnes-Logo.png" width="396" height="72" />
                <span class="Titulo1">Facturación Electrónica </span>
        </div>

        <div class="login" >
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table class="tablainicio">

                <tr>
                    <td>Usuario:</td>
                    <td><input type="text" name="usuario"></td>
 
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="text" name="contrasenia"></td>
                </tr>

                 <tr>
                    <td></td>
                    <td><input type="submit" name="acceder" value="acceder"></td>
                </tr>


            </table>
        </form>
        </div>   
    </body>
</html>

  
