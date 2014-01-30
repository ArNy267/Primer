<?php 

if($_POST){
	
	include "Connections/conexion.php";
	
	if($_POST["user"] == "adming72" && $_POST['pass'] == 'admin')
	{
		session_start();
		$_SESSION["Admin"] = $_POST['user'] ; 
		mysql_close();
		header('Location: admin_home.php');

	}
	else
	{
	
		$query_Consulta = mysql_query("SELECT * FROM clientes WHERE Mail ='".$_POST['user']."'")or die(mysql_error());
			//$totalRows_Consulta = mysql_num_rows($query_Consulta);
	
		if(mysql_num_rows($query_Consulta))
		{
			$row_Consulta = mysql_fetch_assoc($query_Consulta);
			
			if($row_Consulta["Pass"] == $_POST['pass'])
			 {
				//echo "el nombre de usuario ".$row_Consulta["Nombre"]."<br />";
				session_start();
				$_SESSION["Usuario"] = $_POST['user'];
				   $_SESSION["Empresa"] = $row_Consulta["Empresa"];
					 	$_SESSION["Id"] = $row_Consulta["Id"];
				$_SESSION["Id_destino"] = $row_Consulta["Id_destino"];
				 
				mysql_close();
				header('Location: user/home.php');
			
			 }
			 else 
			 {
				?><script type="text/javascript">
					
					window.onload = function(){  //funciones a ejecutar
					  var capa = document.getElementById('msjerror2');
					  var usuario = document.getElementById('user');
					   usuario.value= "<?php echo $_POST["user"] ?>";
					  capa.innerHTML = 'Contraseña incorrecta';
					}	
	
				</script><?php 
			 }
	
		} 
		else
		{ 
			?><script type="text/javascript">
				
				window.onload = 
				
				function(){//funciones a ejecutar
				
				 var usuario = document.getElementById('user');
					   usuario.value= "<?php echo $_POST["user"] ?>";
				 var pass = document.getElementById('pass');
					   pass.value= "<?php echo $_POST["pass"] ?>";
				
				  var capa = document.getElementById('msjerror'); 
				  capa.innerHTML = 'Usuario incorrecto';
				  var capa = document.getElementById('msjerror2'); 
					  capa.innerHTML = 'Contraseña incorrecta';
	
					};	
					//var h1 = document.createElement("h1");
					//capa.appendChild(h1);
			 </script><?php 
			
		 }
		
		/*	do { 
			 echo $row_Consulta["Nombre"];
			}
			while ($row_Consulta >= mysql_fetch_assoc($Consulta)){
				
				 echo $row_Consulta["Nombre"]."<br />";
				
				}; */ 
		}
	} ## END-IF-POST

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 		<title>Untitled Document</title>

	<link type="text/css" rel="stylesheet" href="index.css">
        <script src="js/jquery.js"> </script>
        <script> 
        	$(document).ready(function() {
			
			function clean(link_name){
				
				if( link_name == 'user'){
						//$(".user").innerHTML = "Usuario incorrecto";
						setTimeout(function() {
							$("#msjerror").fadeOut(1500);
							},1);
						
						}		
				
					if( link_name == 'pass'){
						//$(".user").innerHTML = "Usuario incorrecto";
						setTimeout(function() {
							$("#msjerror2").fadeOut(1500);
							},1);
						}	
				
				
				}	
				
				$(":input").click(function() {
					var link_name = $(this).attr('name');
					clean(link_name);
					$(this).val('');
										
				});
				
				$(":input").select(function() {
					var link_name = $(this).attr('name');
					clean(link_name);
					$(this).val('');	
										
				});
				
					
			});
        </script>
    </head>

    <body>
        <div class="LogoBanner">
                <img src="Imagenes/JTCarnes-Logo.png" width="396" height="72" />
                <span class="Titulo1">Ordenes de Pedido </span>
        </div>
        <div style="position:relative">
        <span id="msjerror"></span>
        <span id="msjerror2"></span>
            <form class="Login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table width="100" cellpadding="0" border="0" align="center" cellspacing="2">
                <tbody><tr>
                    <td bgcolor="#EEEEEE" align="right">Usuario: </td>
                    <td><input type="text" id="user" name="user" onClick="" >  </td>
                </tr>
                <tr>
                    <td bgcolor="#EEEEEE" align="right">Contraseña:</td>
                    <td><input type="password" id="pass" name="pass"></td>
                </tr>
                <tr>
                    <th align="left" colspan="2">
                        <input type="submit" value="Aceptar" id="button" name="button">
                        <a href="?RecuperarContrasena">Recuperar Contraseña</a></th>
                    </tr>
                </tbody></table>
            </form>
         </div>
    </body>
</html>