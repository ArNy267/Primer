<div class="skilles form">
<?php echo $this->Form->create('Skill'); ?>
	<fieldset>
		<legend><?php echo __('N Add Skill'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('anios');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('Usuario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Skilles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
