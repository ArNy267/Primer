<div class="solicitudes form">
<?php echo $this->Form->create('Solicitud'); ?>
	<fieldset>
		<legend><?php echo __('N Edit Solicitud'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('privacidad');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('monto');
		echo $this->Form->input('comision');
		echo $this->Form->input('vencimiento');
		echo $this->Form->input('moneda_id');
		echo $this->Form->input('industria_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Solicitud.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Solicitud.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Solicitudes'), array('action' => 'index')); ?></li>
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
