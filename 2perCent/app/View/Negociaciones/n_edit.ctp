<div class="negociaciones form">
<?php echo $this->Form->create('Negociacion'); ?>
	<fieldset>
		<legend><?php echo __('N Edit Negociacion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('mensaje');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('solicitud_id');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('usuario_id2');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Negociacion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Negociacion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Negociaciones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Negociaciones'), array('controller' => 'negociaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Negociacion'), array('controller' => 'negociaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('controller' => 'solicitudes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitud'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
