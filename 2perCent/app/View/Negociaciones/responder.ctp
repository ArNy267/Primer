<div class="negociaciones form">
<?php echo $this->Form->create('Negociacion'); ?>
	<fieldset>
		<legend><?php echo __('Add Negociacion'); ?></legend>
	<?php
		echo $this->Form->input('mensaje');
		echo $this->Form->input('parent_id', array('type' => 'hidden', 'value' => $solicitud));
		echo $this->Form->input('solicitud_id');
		/*echo $this->Html->link(__('Agregar nueva solicitud'), array('controller' => 'solicitudes', 'action' => 'add'));  echo '<br />';*/
		echo $this->Form->input('usuario_id',  array('type' => 'hidden', 'value' => $usuario_logged_id )); 
		echo $this->Form->input('usuario_id2',  array('type' => 'hidden', 'value' => $id ));
		echo $this->Form->input('status',array('type' => 'hidden', 'value' => 0 ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Negociaciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Negociaciones'), array('controller' => 'negociaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Negociacion'), array('controller' => 'negociaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('controller' => 'solicitudes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitud'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>