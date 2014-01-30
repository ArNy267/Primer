<div class="usuarios view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['apellido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Puesto'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['puesto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calificacion'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['calificacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validado'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['validado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['empresa_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['ciudad_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Industria Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['industria_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Movil'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['movil']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['direccion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
