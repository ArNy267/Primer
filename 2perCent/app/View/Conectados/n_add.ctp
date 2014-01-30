<div class="conectados form">
<?php echo $this->Form->create('Conectado'); ?>
	<fieldset>
		<legend><?php echo __('N Add Conectado'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellidos');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Conectados'), array('action' => 'index')); ?></li>
	</ul>
</div>
