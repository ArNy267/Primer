<?php 
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
//echo $this->Html->docType('html5');
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');?>
<!DOCTYPE html>
<html>
<head>
	<?php //echo $this->Html->charset('utf-8'); ?>
	<?PHP echo $this->Html->css(array(
			'font/fonts','bootstrap','style','bootstrap-select.min', 'bootstrap_responsive','dropkick')); ?>
	<?PHP echo $this->Html->script(array(
			'jquery','bootstrap','html5','bootstrap-select.min','bootstrap-tab','bootstrap-collapse',
			'bootstrap-tooltip','respond.src','sorttable'))?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	

<script type="text/javascript">
$(function () {
		
  $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
		});

	$('.dropdown-toggle').dropdown()
	
	$(".collapse").collapse()

</script>
<script type="text/x-javascript">
jQuery(document).ready(function ($) {
            // Code using $ as usual goes here.
            jQuery(".in").each(function (index) {
                jQuery(this).parent("div").addClass("first");
            });
           
			jQuery("#search").keypress(function( event ) {
				    if ( event.which == 13 ) {
					     //alert('alerta exitosa');

					     jQuery("#search").value(); 

					}
										
				});
			  
			

        });

</script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
	
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
		echo $this->Html->script('jquery-tokeninput/src/jquery.tokeninput');
                
	?>
</head>

<body>
	<div class="header" id="header">
			<div class="container">
		    	<div class="pull-left"> 
		    		<?php echo $this->html->image('logo.png', array(
		    				'url' => array(
		    						'controller' => 'Usuarios', 'action' => 'index'	
		    					)


		    			));
		    		?> 
		    	</div>
		    	<div class="pull-right span10">
		     		<div class="pull-left span3">
		        		<div class="nav"> 
		        			<a href="#">Account</a> <a href="#">herramientas</a> </div>
		     		</div>
		      		<div class="pull-left span2">
		        		<div class="set_box dropdown"> 
		        			<span>
		          				<figure></figure>
		          				<?php echo $this->html->image('meber_pic.png');?>
		          				<!-- <img src="images/meber_pic.jpg" alt=""/> -->
		          			</span> 
		          			<a data-toggle="dropdown" href="#" ><?php echo $usuario_logged_nombre.' '.$usuario_logged_apellido;
		          			?> <i class="downarrow" ></i></a>
			          		<ul aria-labelledby="dLabel" role="menu" class="dropdown-menu">
			            		<li class="first">
			            			<?php echo $this->html->image('settings_icon2.png');?>
			            				<?PHP

			            	echo $this->Html->link($this->Html->tag('span',__('Settings',true)),array('controller'=>'usuarios','action'=>'index'),array(
			            			'escape'=>false));

			            					 ?>
			            				<!-- <img alt="" src="images/settings_icon2.png"> -->
			            			
			            		</li>
			            		<li>
			            			<?php echo $this->html->image('user_icon.png');?>

			            	<?php echo $this->Html->link($this->Html->tag('span',__('Profile',true)),array('controller'=>'usuarios','action'=>'view',$usuario_logged_id),array(
			            			'escape'=>false)); ?>
			            				<!-- <img alt="" src="images/user_icon.png"> -->
			            		</li>
			            		<li class="last">
			            			<?php echo $this->html->image('logout_icon.png');?>
			            			<?php echo $this->Html->link($this->Html->tag('span',__('Logout',true)),array('controller'=>'usuarios','action'=>'logout'),array(
			            			'escape'=>false)); ?>
			            			<!-- <img alt="" src="images/logout_icon.png"> -->
			            		</li>
			          		</ul>
		        		</div>
		      		</div>
				    <div class="pull-left badge-main span"> 
				      	<a  href="#"> <?php echo $this->html->image('top-icon1.png', array(
				      			'class' => 'fl',
				      		));?>
				      		<!-- <img class="fl" alt="" src="images/top-icon1.png">  -->
				        	<div class="badge fl push-upside-bage">23 </div>
				        </a> 
				        <a  href="#"> <?php echo $this->html->image('top-icon2.png', array(
				      			'class' => 'fl',
				      		));?>
				        	<!-- <img class="fl" alt="" src="images/top-icon2.png"> -->
				       	 	<div class="badge fl push-upside-bage">23 </div>
				        </a> 
				    </div>
				    <div class=" pull-right search-query">
				        <div class="search">

				 		   <?php echo $this->Form->create( array(
				 		   		//'action' => array(
				 		   			'controller' => 'Usuarios', 'action' => 'Buscar'
				 		   		//	)
				 		   	)); ?>
	           <!--  <fieldset> <?php echo $this->Form->input('Buscar');?> </fieldset> -->
	            			<input name="data[Busqueda][Buscar]"  id="search" type="text" class="textbox" placeholder="Search"  >
							<?php echo $this->Form->end(); ?>
				        </div>
				    </div>
		    	</div>
		 	</div>
	</div>
	   <!-- Aqui empieza en contenido del centro  -->      
	<div class="row-fluid"> 
	  	<div class="container pad"> 

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

		</div>

	</div>
			<?php  echo $this->element('sql_dump'); ?>

	<!-- Aqui empieza en contenido del Footer  -->		
<div class="modal-footer">
  <div class="container">
    <div class="span2" style="margin-left:0px;"> <img src="images/footerlogo.png" alt=""/> </div>
    <div class="span2">
      <h2>About</h2>
      <div> <a href="#">Terminos </a> <a href="#">Condiciones </a> <a href="#">Faqs </a> <a href="#">Links relacionados </a> <a href="#">Account </a> </div>
    </div>
    <div class="span2">
      <h2>settings</h2>
      <div> <a href="#">Settings </a> <a href="#">Mapa de Sitio </a> <a href="#">Paginator </a> <a href="#">Navigation </a> <a href="#">Buttons </a> </div>
    </div>
    <div class="span2">
      <h2>loadings</h2>
      <div> <a href="#"> Mapa</a> <a href="#">Carga inicial</a> <a href="#">Chats</a> <a href="#">Timeline </a> </div>
    </div>
    <div class="span2  socialblock">
      <h2>Social media</h2>
      <div> <a href="#"> <span><img src="images/f-icon.jpg" alt=""/></span> Facebook</a> <a href="#"> <span><img src="images/t-icon.jpg" alt=""/></span> Twitter</a> <a href="#"> <span><img src="images/p-icon.jpg" alt=""/></span> Pinterest</a> <a href="#"> <span><img src="images/in-icon.jpg" alt=""/></span> Linkedin </a> </div>
    </div>
  </div>
</div>
<div class="modal-footer2"> All rights Reserven for TWOPCT 2013 </div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
<script>
$(function() {
$( "#datepicker" ).datepicker({
showOn: "button",
buttonImage: "images/calander_icon.png",
buttonImageOnly: true
});
});
</script> 
<script src="js/dropkick.js" type="text/javascript" charset="utf-8"></script> 
<script type="text/javascript">
$(function () {
	$('.listing-box').dropkick();
	$('.listing-box1').dropkick();
	$('.listing-box2').dropkick();
	$('.listing-box3').dropkick();
	$('.listing-box4').dropkick();
	$('.listing-box5').dropkick();
	$('.listing-box6').dropkick();
	$('.listing-box7').dropkick();
	$('.listing-box8').dropkick();
	$('.listing-box9').dropkick();
});
</script>
</body>
</html>
