<div class="negociaciones view">
<h2><?php echo __('Negociacion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($negociacion['Negociacion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mensaje'); ?></dt>
		<dd>
			<?php echo h($negociacion['Negociacion']['mensaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Negociacion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($negociacion['ParentNegociacion']['id'], array('controller' => 'negociaciones', 'action' => 'view', $negociacion['ParentNegociacion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Solicitud'); ?></dt>
		<dd>
			<?php echo $this->Html->link($negociacion['Solicitud']['id'], array('controller' => 'solicitudes', 'action' => 'view', $negociacion['Solicitud']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($negociacion['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $negociacion['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario Id2'); ?></dt>
		<dd>
			<?php echo h($negociacion['Negociacion']['usuario_id2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($negociacion['Negociacion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($negociacion['Negociacion']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Negociacion'), array('action' => 'edit', $negociacion['Negociacion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Negociacion'), array('action' => 'delete', $negociacion['Negociacion']['id']), null, __('Are you sure you want to delete # %s?', $negociacion['Negociacion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Negociacion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociaciones'), array('controller' => 'negociaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Negociacion'), array('controller' => 'negociaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('controller' => 'solicitudes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitud'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Negociaciones'); ?></h3>
	<?php if (!empty($negociacion['ChildNegociacion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Mensaje'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Solicitud Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Usuario Id2'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($negociacion['ChildNegociacion'] as $childNegociacion): ?>
		<tr>
			<td><?php echo $childNegociacion['id']; ?></td>
			<td><?php echo $childNegociacion['mensaje']; ?></td>
			<td><?php echo $childNegociacion['parent_id']; ?></td>
			<td><?php echo $childNegociacion['solicitud_id']; ?></td>
			<td><?php echo $childNegociacion['usuario_id']; ?></td>
			<td><?php echo $childNegociacion['usuario_id2']; ?></td>
			<td><?php echo $childNegociacion['created']; ?></td>
			<td><?php echo $childNegociacion['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'negociaciones', 'action' => 'view', $childNegociacion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'negociaciones', 'action' => 'edit', $childNegociacion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'negociaciones', 'action' => 'delete', $childNegociacion['id']), null, __('Are you sure you want to delete # %s?', $childNegociacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Negociacion'), array('controller' => 'negociaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
