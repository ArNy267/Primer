<div class="mensajes index">
	<h2><?php echo __('Mensajes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('mensaje'); ?></th>
			<th><?php echo $this->Paginator->sort('de'); ?></th>
			<th><?php echo $this->Paginator->sort('para'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('leido'); ?></th>
			<th><?php echo $this->Paginator->sort('canal'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($mensajes as $mensaj): ?>
	<tr>
		<td><?php echo h($mensaj['Mensaj']['id']); ?>&nbsp;</td>
		<td><?php echo h($mensaj['Mensaj']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($mensaj['Mensaj']['mensaje']); ?>&nbsp;</td>
		<td><?php echo h($mensaj['Mensaj']['de']); ?>&nbsp;</td>
		<td><?php echo h($mensaj['Mensaj']['para']); ?>&nbsp;</td>
		<td><?php echo h($mensaj['Mensaj']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($mensaj['Mensaj']['leido']); ?>&nbsp;</td>
		<td><?php echo h($mensaj['Mensaj']['canal']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mensaj['ParentMensaj']['titulo'], array('controller' => 'mensajes', 'action' => 'view', $mensaj['ParentMensaj']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mensaj['Mensaj']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mensaj['Mensaj']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mensaj['Mensaj']['id']), null, __('Are you sure you want to delete # %s?', $mensaj['Mensaj']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Mensaj'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Mensajes'), array('controller' => 'mensajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Mensaj'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
	</ul>
</div>
