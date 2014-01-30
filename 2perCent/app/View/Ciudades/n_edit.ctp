<div class="ciudades form">
<?php echo $this->Form->create('Ciudad'); ?>
	<fieldset>
		<legend><?php echo __('N Edit Ciudad'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('estado_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ciudad.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ciudad.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
