<div class="solicitudes view">
<h2><?php echo __('Solicitud'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Privacidad'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['privacidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($solicitud['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $solicitud['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comision'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['comision']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vencimiento'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['vencimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Moneda'); ?></dt>
		<dd>
			<?php echo $this->Html->link($solicitud['Moneda']['id'], array('controller' => 'monedas', 'action' => 'view', $solicitud['Moneda']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Industria'); ?></dt>
		<dd>
			<?php echo $this->Html->link($solicitud['Industria']['nombre'], array('controller' => 'industrias', 'action' => 'view', $solicitud['Industria']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($solicitud['Solicitud']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Solicitud'), array('action' => 'edit', $solicitud['Solicitud']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Solicitud'), array('action' => 'delete', $solicitud['Solicitud']['id']), null, __('Are you sure you want to delete # %s?', $solicitud['Solicitud']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitud'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Negociaciones'); ?></h3>
	<?php if (!empty($solicitud['Negociacion'])): ?>
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
	<?php foreach ($solicitud['Negociacion'] as $negociacion): ?>
		<tr>
			<td><?php echo $negociacion['id']; ?></td>
			<td><?php echo $negociacion['mensaje']; ?></td>
			<td><?php echo $negociacion['parent_id']; ?></td>
			<td><?php echo $negociacion['solicitud_id']; ?></td>
			<td><?php echo $negociacion['usuario_id']; ?></td>
			<td><?php echo $negociacion['usuario_id2']; ?></td>
			<td><?php echo $negociacion['created']; ?></td>
			<td><?php echo $negociacion['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'negociaciones', 'action' => 'view', $negociacion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'negociaciones', 'action' => 'edit', $negociacion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'negociaciones', 'action' => 'delete', $negociacion['id']), null, __('Are you sure you want to delete # %s?', $negociacion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Negociacion'), array('controller' => 'negociaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
