<div class="conectados view">
<h2><?php echo __('Conectado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($conectado['Conectado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($conectado['Conectado']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellidos'); ?></dt>
		<dd>
			<?php echo h($conectado['Conectado']['apellidos']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Conectado'), array('action' => 'edit', $conectado['Conectado']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Conectado'), array('action' => 'delete', $conectado['Conectado']['id']), null, __('Are you sure you want to delete # %s?', $conectado['Conectado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Conectados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conectado'), array('action' => 'add')); ?> </li>
	</ul>
</div>
