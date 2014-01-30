<div class="ciudades view">
<h2><?php echo __('Ciudad'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ciudad['Ciudad']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ciudad['Ciudad']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ciudad['Estado']['id'], array('controller' => 'estados', 'action' => 'view', $ciudad['Estado']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ciudad'), array('action' => 'edit', $ciudad['Ciudad']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ciudad'), array('action' => 'delete', $ciudad['Ciudad']['id']), null, __('Are you sure you want to delete # %s?', $ciudad['Ciudad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudad'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Usuarios'); ?></h3>
	<?php if (!empty($ciudad['Usuario'])): ?>
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
	<?php foreach ($ciudad['Usuario'] as $usuario): ?>
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
