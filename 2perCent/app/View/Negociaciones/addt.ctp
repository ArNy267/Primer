 <!-- Button to trigger modal -->
 <a href="#myModalt" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

		    <!-- Modal -->
		    <div id="myModalt" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    	<div class="modal-header">
		    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    		<h3 id="myModalLabel">Modal header</h3>
		    	</div>
		    	<div class="modal-body"> Cualquier cosa</div>
			
		    	
		    	<div class="modal-footer">
		    		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		    		<button class="btn btn-primary">Save changes</button>
		    	</div>
		    </div>

<div class="modal-body">

<div>     
	<div style="margin: 5px 0 ">
        <ul>
        <?PHP if ($Negocios != '' && $Negocios != null) {  ?>
        	<h3> Tienes una Negociacion que coincide con esta relacion. </h3>
          <?php foreach ($Negocios as $item) { 

            if ($item['Negociacion']['usuario_id'] == $usuario_logged_id && 
              $item['Negociacion']['parent_id'] == 0 ) { ?>


             <li> <?php echo $this->Html->link(__('Ver Negociacion' /*$item['Usuario2']['nombre'].' '.$item['Usuario2']['apellido']*/), array(
              'controller' => 'Negociaciones', 'action' => 'view', $item['Negociacion']['id']  
              ));?>

            </li>

            <?php }  ?>   
            <?php } }?>
          </ul>
	</div>
</div>

<div class="negociaciones form">

<?php echo $this->Form->create('Negociacion'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Negociacion'); ?></legend>
	<?php
		echo $this->Form->input('mensaje');
		echo $this->Form->input('parent_id', array('type' => 'hidden', 'value' => 0 ));
		echo $this->Form->input('solicitud_id');
		echo $this->Html->link(__('Agregar nueva solicitud'), array('controller' => 'solicitudes', 'action' => 'add'));  echo '<br />';
		echo $this->Form->input('usuario_id',  array('type' => 'hidden', 'value' => $usuario_logged_id )); 
		echo $this->Form->input('usuario_id2',  array('type' => 'hidden', 'value' => $id ));
		echo $this->Form->input('status',array('type' => 'hidden', 'value' => 0 ));
	?>
	</fieldset>
	<br>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>
