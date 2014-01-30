<div class="usuarios form">
<?php echo $this->Form->create('Usuario'); ?>
	<fieldset>
		<legend><?php echo __('Edit Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellido');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('puesto');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('calificacion');
		echo $this->Form->input('activo');
		echo $this->Form->input('validado');
		echo $this->Form->input('empresa_id');
		echo $this->Form->input('ciudad_id');
		echo $this->Form->input('industria_id');
		echo $this->Form->input('telefono');
		echo $this->Form->input('movil');
		echo $this->Form->input('direccion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usuario.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Usuario.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
