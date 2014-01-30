<div class="monedas form">
<?php echo $this->Form->create('Moneda'); ?>
	<fieldset>
		<legend><?php echo __('Edit Moneda'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Moneda.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Moneda.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Monedas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('controller' => 'solicitudes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitude'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
	</ul>
</div>
