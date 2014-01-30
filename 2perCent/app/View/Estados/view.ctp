<div class="estados view">
<h2><?php echo __('Estado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($estado['Estado']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo $this->Html->link($estado['Pais']['id'], array('controller' => 'paises', 'action' => 'view', $estado['Pais']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estado'), array('action' => 'edit', $estado['Estado']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estado'), array('action' => 'delete', $estado['Estado']['id']), null, __('Are you sure you want to delete # %s?', $estado['Estado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('controller' => 'ciudades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudad'), array('controller' => 'ciudades', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ciudades'); ?></h3>
	<?php if (!empty($estado['Ciudad'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($estado['Ciudad'] as $ciudad): ?>
		<tr>
			<td><?php echo $ciudad['id']; ?></td>
			<td><?php echo $ciudad['nombre']; ?></td>
			<td><?php echo $ciudad['estado_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ciudades', 'action' => 'view', $ciudad['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ciudades', 'action' => 'edit', $ciudad['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ciudades', 'action' => 'delete', $ciudad['id']), null, __('Are you sure you want to delete # %s?', $ciudad['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ciudad'), array('controller' => 'ciudades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
