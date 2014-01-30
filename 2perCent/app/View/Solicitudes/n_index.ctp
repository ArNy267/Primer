<div class="solicitudes index">
	<h2><?php echo __('Solicitudes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('privacidad'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th><?php echo $this->Paginator->sort('comision'); ?></th>
			<th><?php echo $this->Paginator->sort('vencimiento'); ?></th>
			<th><?php echo $this->Paginator->sort('moneda_id'); ?></th>
			<th><?php echo $this->Paginator->sort('industria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($solicitudes as $solicitud): ?>
	<tr>
		<td><?php echo h($solicitud['Solicitud']['id']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['privacidad']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($solicitud['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $solicitud['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($solicitud['Solicitud']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['monto']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['comision']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['vencimiento']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($solicitud['Moneda']['id'], array('controller' => 'monedas', 'action' => 'view', $solicitud['Moneda']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($solicitud['Industria']['nombre'], array('controller' => 'industrias', 'action' => 'view', $solicitud['Industria']['id'])); ?>
		</td>
		<td><?php echo h($solicitud['Solicitud']['status']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['created']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $solicitud['Solicitud']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $solicitud['Solicitud']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $solicitud['Solicitud']['id']), null, __('Are you sure you want to delete # %s?', $solicitud['Solicitud']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Solicitud'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Monedas'), array('controller' => 'monedas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Moneda'), array('controller' => 'monedas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Industrias'), array('controller' => 'industrias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Industria'), array('controller' => 'industrias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Negociaciones'), array('controller' => 'negociaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Negociacion'), array('controller' => 'negociaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
