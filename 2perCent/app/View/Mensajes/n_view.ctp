<div class="mensajes view">
<h2><?php echo __('Mensaj'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mensaj['Mensaj']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($mensaj['Mensaj']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mensaje'); ?></dt>
		<dd>
			<?php echo h($mensaj['Mensaj']['mensaje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('De'); ?></dt>
		<dd>
			<?php echo h($mensaj['Mensaj']['de']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Para'); ?></dt>
		<dd>
			<?php echo h($mensaj['Mensaj']['para']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($mensaj['Mensaj']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leido'); ?></dt>
		<dd>
			<?php echo h($mensaj['Mensaj']['leido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Canal'); ?></dt>
		<dd>
			<?php echo h($mensaj['Mensaj']['canal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Mensaj'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mensaj['ParentMensaj']['titulo'], array('controller' => 'mensajes', 'action' => 'view', $mensaj['ParentMensaj']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mensaj'), array('action' => 'edit', $mensaj['Mensaj']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mensaj'), array('action' => 'delete', $mensaj['Mensaj']['id']), null, __('Are you sure you want to delete # %s?', $mensaj['Mensaj']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mensajes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mensaj'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mensajes'), array('controller' => 'mensajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Mensaj'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Mensajes'); ?></h3>
	<?php if (!empty($mensaj['ChildMensaj'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Mensaje'); ?></th>
		<th><?php echo __('De'); ?></th>
		<th><?php echo __('Para'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Leido'); ?></th>
		<th><?php echo __('Canal'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mensaj['ChildMensaj'] as $childMensaj): ?>
		<tr>
			<td><?php echo $childMensaj['id']; ?></td>
			<td><?php echo $childMensaj['titulo']; ?></td>
			<td><?php echo $childMensaj['mensaje']; ?></td>
			<td><?php echo $childMensaj['de']; ?></td>
			<td><?php echo $childMensaj['para']; ?></td>
			<td><?php echo $childMensaj['fecha']; ?></td>
			<td><?php echo $childMensaj['leido']; ?></td>
			<td><?php echo $childMensaj['canal']; ?></td>
			<td><?php echo $childMensaj['parent_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'mensajes', 'action' => 'view', $childMensaj['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'mensajes', 'action' => 'edit', $childMensaj['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'mensajes', 'action' => 'delete', $childMensaj['id']), null, __('Are you sure you want to delete # %s?', $childMensaj['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Mensaj'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
