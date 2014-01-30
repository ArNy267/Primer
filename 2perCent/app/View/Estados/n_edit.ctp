<div class="estados form">
<?php echo $this->Form->create('Estado'); ?>
	<fieldset>
		<legend><?php echo __('N Edit Estado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('pais_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Estado.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Estado.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Estados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('controller' => 'ciudades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudad'), array('controller' => 'ciudades', 'action' => 'add')); ?> </li>
	</ul>
</div>
