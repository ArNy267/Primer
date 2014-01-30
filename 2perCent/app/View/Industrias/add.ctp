<div class="industrias form">
<?php echo $this->Form->create('Industria'); ?>
	<fieldset>
		<legend><?php echo __('Add Industria'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Industrias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('controller' => 'solicitudes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitud'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
