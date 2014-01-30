<div class="usuariosSkilles form">
<?php echo $this->Form->create('UsuariosSkill'); ?>
	<fieldset>
		<legend><?php echo __('Edit Usuarios Skill'); ?></legend>
	<?php
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('skill_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UsuariosSkill.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UsuariosSkill.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios Skilles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Skilles'), array('controller' => 'skilles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Skill'), array('controller' => 'skilles', 'action' => 'add')); ?> </li>
	</ul>
</div>
