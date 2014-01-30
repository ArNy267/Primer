<div class="negociaciones index">
	<h2><?php echo __('Negociaciones'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('mensaje'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('solicitud_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id2'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($negociaciones as $negociacion): ?>
	<tr>
		<td><?php echo h($negociacion['Negociacion']['id']); ?>&nbsp;</td>
		<td><?php echo h($negociacion['Negociacion']['mensaje']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($negociacion['ParentNegociacion']['id'], array('controller' => 'negociaciones', 'action' => 'view', $negociacion['ParentNegociacion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($negociacion['Solicitud']['id'], array('controller' => 'solicitudes', 'action' => 'view', $negociacion['Solicitud']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($negociacion['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $negociacion['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($negociacion['Negociacion']['usuario_id2']); ?>&nbsp;</td>
		<td><?php echo h($negociacion['Negociacion']['created']); ?>&nbsp;</td>
		<td><?php echo h($negociacion['Negociacion']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $negociacion['Negociacion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $negociacion['Negociacion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $negociacion['Negociacion']['id']), null, __('Are you sure you want to delete # %s?', $negociacion['Negociacion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Negociacion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Negociaciones'), array('controller' => 'negociaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Negociacion'), array('controller' => 'negociaciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('controller' => 'solicitudes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitud'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
