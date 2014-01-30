<div class="usuarios index">
	<h2><?php echo __('Usuarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellido'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('puesto'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('calificacion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('activo'); ?></th>
			<th><?php echo $this->Paginator->sort('validado'); ?></th>
			<th><?php echo $this->Paginator->sort('empresa_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ciudad_id'); ?></th>
			<th><?php echo $this->Paginator->sort('industria_id'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('movil'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['password']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['puesto']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['calificacion']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['created']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['modified']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['activo']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['validado']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['empresa_id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['ciudad_id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['industria_id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['movil']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['direccion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?></li>
	</ul>
</div>
