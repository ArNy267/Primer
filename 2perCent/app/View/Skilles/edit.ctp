<div class="skilles form">
<?php echo $this->Form->create('Skill'); ?>
	<fieldset>
		<legend><?php echo __('Edit Skill'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Skill.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Skill.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Skilles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
