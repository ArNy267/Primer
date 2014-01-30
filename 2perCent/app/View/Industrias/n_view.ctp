<div class="industrias view">
<h2><?php echo __('Industria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($industria['Industria']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($industria['Industria']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Industria'), array('action' => 'edit', $industria['Industria']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Industria'), array('action' => 'delete', $industria['Industria']['id']), null, __('Are you sure you want to delete # %s?', $industria['Industria']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Industrias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Industria'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('controller' => 'solicitudes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Solicitud'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Solicitudes'); ?></h3>
	<?php if (!empty($industria['Solicitud'])): ?>
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
	<?php foreach ($industria['Solicitud'] as $solicitud): ?>
		<tr>
			<td><?php echo $solicitud['id']; ?></td>
			<td><?php echo $solicitud['privacidad']; ?></td>
			<td><?php echo $solicitud['usuario_id']; ?></td>
			<td><?php echo $solicitud['titulo']; ?></td>
			<td><?php echo $solicitud['descripcion']; ?></td>
			<td><?php echo $solicitud['monto']; ?></td>
			<td><?php echo $solicitud['comision']; ?></td>
			<td><?php echo $solicitud['vencimiento']; ?></td>
			<td><?php echo $solicitud['moneda_id']; ?></td>
			<td><?php echo $solicitud['industria_id']; ?></td>
			<td><?php echo $solicitud['status']; ?></td>
			<td><?php echo $solicitud['created']; ?></td>
			<td><?php echo $solicitud['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'solicitudes', 'action' => 'view', $solicitud['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'solicitudes', 'action' => 'edit', $solicitud['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'solicitudes', 'action' => 'delete', $solicitud['id']), null, __('Are you sure you want to delete # %s?', $solicitud['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Solicitud'), array('controller' => 'solicitudes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Usuarios'); ?></h3>
	<?php if (!empty($industria['Usuario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Puesto'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Calificacion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Validado'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Ciudad Id'); ?></th>
		<th><?php echo __('Industria Id'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Movil'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($industria['Usuario'] as $usuario): ?>
		<tr>
			<td><?php echo $usuario['id']; ?></td>
			<td><?php echo $usuario['nombre']; ?></td>
			<td><?php echo $usuario['apellido']; ?></td>
			<td><?php echo $usuario['email']; ?></td>
			<td><?php echo $usuario['password']; ?></td>
			<td><?php echo $usuario['puesto']; ?></td>
			<td><?php echo $usuario['descripcion']; ?></td>
			<td><?php echo $usuario['calificacion']; ?></td>
			<td><?php echo $usuario['created']; ?></td>
			<td><?php echo $usuario['modified']; ?></td>
			<td><?php echo $usuario['activo']; ?></td>
			<td><?php echo $usuario['validado']; ?></td>
			<td><?php echo $usuario['empresa_id']; ?></td>
			<td><?php echo $usuario['ciudad_id']; ?></td>
			<td><?php echo $usuario['industria_id']; ?></td>
			<td><?php echo $usuario['telefono']; ?></td>
			<td><?php echo $usuario['movil']; ?></td>
			<td><?php echo $usuario['direccion']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'usuarios', 'action' => 'view', $usuario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'usuarios', 'action' => 'edit', $usuario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'usuarios', 'action' => 'delete', $usuario['id']), null, __('Are you sure you want to delete # %s?', $usuario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
