
<script>

</script>
<script>
$(document).ready(function() {
// Support for AJAX loaded modal window.
// Focuses on first input textbox after it loads the window.

//$('#myModal').data('modal', null);

$('#myModal').on('shown', function(){
  alert('casa blanca');
});

$('#closeModal').on('shown', function(){
   // $("#div1").html('');
   alert('casa blanca');

});
        
        $('[data-toggle="modal"]').click(function(e) {
	e.preventDefault();
	var url = $(this).attr('href');
	if (url.indexOf('#') == 0) {
		$(url).modal('open');
	} else {
		$.get(url, function(data) {
			$('<div class="modal hide fade">' + data + '</div>').modal;
		}).success(function() { $('input:text:visible:first').focus(); });
	}
	});
        
       
        
});
</script>
<style>

#wpt-contenido h3{
 
	text-align: center;

}

</style>

<div id="wpt-contenido">
    <div id="perfil">
		<?php

	        if($BusquedaUsuario != null &&  $BusquedaUsuario != '' ){	
	        	echo "<h4>Usuarios que coinciden con ese nombre </h4>";
		        foreach($BusquedaUsuario as $item): ?>

		            <div class="step" >
		                <div class="jms-content">
		                 	<p><h3>
		                 		<?php 

		                 		//echo $item['Usuario']['nombre'].' '.$item['Usuario']['apellido'];
		                 		echo $this->Html->link(__($item['Usuario']['nombre'].' '.$item['Usuario']['apellido']), array(
		                 			'controller' => 'Usuarios', 'action' => 'view',$item['Usuario']['id'] )); 
		                 			  
		                 		?> 
		                       	</h3> 
		                    </p>
		                </div>
		            </div>
		  <?php endforeach; 
		       		
		       } else { ?>

		<div id="UsuariosSkill">
		<?php

	        if($AmigosSkilles != null &&  $AmigosSkilles != '' ){	
	        	echo "<h4> Amigos que coinciden con tu Busqueda. </h4>";
		        foreach($AmigosSkilles as $item): ?>

		            <div class="step" >
		                <div class="jms-content">
		                 	<p><h3>
		                 		<?php 

		                 	echo $item['Usuario']['nombre'].' '.$item['Usuario']['apellido'].'<br />'.$item['Skill']['nombre'];
		                 		/*echo $this->Html->link(__($item['Usuario']['nombre'].' '.$item['Usuario']['apellido']), array(
		                 			'controller' => 'Usuarios', 'action' => 'view',$item['Usuario']['id'] )); 
		                 			 */ 
		                 		?> 
		                       	</h3> 
		                    </p>
		                </div>
		            </div>
		  <?php endforeach; 
		       		
		       }  ?>

		
		<div id="amigosde">
		<?php 
			/*debug($Skilleses);
			debug($filtro);
*/
		if($Skilleses != null &&  $Skilleses != '' ){	
	        
	        	echo "<h4> Busquedas relacionadas </h4>";

                        $i=1;
                        
		   	foreach($Skilleses as $itemU): 
    
		   	//	echo "<h3>".$itemU['Usuario']['nombre'].'   '.$itemU['Usuario']['apellido']."</h3>";

	        	if($filtro != null &&  $filtro != ''){	
	        	
		        	foreach($filtro as $item): ?>

                                
		       		 <?php   
                                    if($itemU['Usuario']['id'] == $item['Usuarios']['id']) { ?>
		                 	<p><h3><?php 
                                        
                                          echo $this->Html->link($item['Usuarios1']['nombre'].' '.$item['Usuarios1']['apellido'],
                                                    array( 'controller' => 'Negociaciones', 'action' => 'add',$item['Usuarios']['id'], $Buscar ),
                                                    array( 'class' => 'sipirili' , 'data-toggle' => 'modal', 'data-target' => '#myModal'.$i.'','escape' => false) 

                                                );

                                          echo "<br />";
		          				//echo $item['Usuarios1']['nombre'].' '.$item['Usuarios1']['apellido'].'<br />';
		          				echo $itemU['Skill']['nombre'];
		                 	 
		                 			 
		                 		?> 
		                       	</h3> 
		                    </p>

		           <?php  }  endforeach;   

		        	foreach($filtro as $item): ?>

		    	 <?php   if($itemU['Usuario']['id'] == $item['Usuarios1']['id']) { ?>	
		                 	<p><h3>
		                 		<?php
                                                
                                                  echo $this->Html->link($item['Usuarios']['nombre'].' '.$item['Usuarios']['apellido'],
                                                    array( 'controller' => 'Negociaciones', 'action' => 'add',$item['Usuarios']['id'], $Buscar ),
                                                     array( 'class' => 'sipirili' , 'data-toggle' => 'modal', 'data-target' => '#myModal'.$i.'','escape' => false) 

                                                );
                                                      
		                 		
                                            echo "<br />"; 
                                                //echo $item['Usuarios']['nombre'].' '.$item['Usuarios']['apellido'].'<br />';
                                                echo $itemU['Skill']['nombre'];

		                 		?> 
		                       	</h3> 
		                    </p>

		           <?php  } endforeach; 

		        } 

		          $i++;  ?>

		  <?php endforeach; 
		       		
		       }   ?>

		</div> 
   	 <!-- Button to trigger modal   <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

		    <!-- Modal -->
                    <?php   for($j=1; $j<=$i; $j++){   ?>
		    <div id="myModal<?php echo $j; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-remotehref="/LuisDuran/Negociaciones/add/">
		    	<div class="modal-header">
		    		<button id='closeModal' type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
		    		<h3 id="myModalLabel"> Agregar Negociacion </h3>
		    	</div>
		    	<div class="modal-body">
                        
                        
                        
                        </div>

		    	<div class="modal-footer">
<!--		    		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                <div class="submit">
                                    <input class="btn btn-primary" type="submit" value="Guardar">
                                </div>-->
		    		
		    	</div>
		    </div>
                    
                   <?php  } ?>

		</div>

		<?php  }?>

	</div>
</div>

