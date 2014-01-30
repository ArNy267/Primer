<div class="monedas view">
<h2><?php echo __('Moneda'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($moneda['Moneda']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($moneda['Moneda']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($moneda['Moneda']['codigo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Moneda'), array('action' => 'edit', $moneda['Moneda']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Moneda'), array('action' => 'delete', $moneda['Moneda']['id']), null, __('Are you sure you want to delete # %s?', $moneda['Moneda']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Monedas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Moneda'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('controller' => 'solicitudes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitude'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Solicitudes'); ?></h3>
	<?php if (!empty($moneda['Solicitude'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Privacidad'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Titulo'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Comision'); ?></th>
		<th><?php echo __('Vencimiento'); ?></th>
		<th><?php echo __('Moneda Id'); ?></th>
		<th><?php echo __('Industria Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($moneda['Solicitude'] as $solicitude): ?>
		<tr>
			<td><?php echo $solicitude['id']; ?></td>
			<td><?php echo $solicitude['privacidad']; ?></td>
			<td><?php echo $solicitude['usuario_id']; ?></td>
			<td><?php echo $solicitude['titulo']; ?></td>
			<td><?php echo $solicitude['descripcion']; ?></td>
			<td><?php echo $solicitude['monto']; ?></td>
			<td><?php echo $solicitude['comision']; ?></td>
			<td><?php echo $solicitude['vencimiento']; ?></td>
			<td><?php echo $solicitude['moneda_id']; ?></td>
			<td><?php echo $solicitude['industria_id']; ?></td>
			<td><?php echo $solicitude['status']; ?></td>
			<td><?php echo $solicitude['created']; ?></td>
			<td><?php echo $solicitude['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'solicitudes', 'action' => 'view', $solicitude['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'solicitudes', 'action' => 'edit', $solicitude['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'solicitudes', 'action' => 'delete', $solicitude['id']), null, __('Are you sure you want to delete # %s?', $solicitude['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Solicitude'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
