<div class="conectados index">
	<h2><?php echo __('Conectados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellidos'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($conectados as $conectado): ?>
	<tr>
		<td><?php echo h($conectado['Conectado']['id']); ?>&nbsp;</td>
		<td><?php echo h($conectado['Conectado']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($conectado['Conectado']['apellidos']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $conectado['Conectado']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $conectado['Conectado']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $conectado['Conectado']['id']), null, __('Are you sure you want to delete # %s?', $conectado['Conectado']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Conectado'), array('action' => 'add')); ?></li>
	</ul>
</div>
