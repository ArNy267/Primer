<div class="mensajes form">
<?php echo $this->Form->create('Mensaj'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mensaj'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titulo');
		echo $this->Form->input('mensaje');
		echo $this->Form->input('de');
		echo $this->Form->input('para');
		echo $this->Form->input('fecha');
		echo $this->Form->input('leido');
		echo $this->Form->input('canal');
		echo $this->Form->input('parent_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Mensaj.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Mensaj.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mensajes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Mensajes'), array('controller' => 'mensajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Mensaj'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
	</ul>
</div>
