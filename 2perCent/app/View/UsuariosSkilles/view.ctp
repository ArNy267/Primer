<div class="usuariosSkilles view">
<h2><?php echo __('Usuarios Skill'); ?></h2>
	<dl>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuariosSkill['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $usuariosSkill['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Skill'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuariosSkill['Skill']['id'], array('controller' => 'skilles', 'action' => 'view', $usuariosSkill['Skill']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuarios Skill'), array('action' => 'edit', $usuariosSkill['UsuariosSkill']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuarios Skill'), array('action' => 'delete', $usuariosSkill['UsuariosSkill']['id']), null, __('Are you sure you want to delete # %s?', $usuariosSkill['UsuariosSkill']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios Skilles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuarios Skill'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Skilles'), array('controller' => 'skilles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Skill'), array('controller' => 'skilles', 'action' => 'add')); ?> </li>
	</ul>
</div>
