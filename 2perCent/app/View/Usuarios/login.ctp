<div class="usersform">
			 <?php echo $this->Session->flash('auth'); ?>
			 <?php echo $this->Form->create('Usuarios'); ?>
    <fieldset>
     <legend><?php echo __('Favor de ingresar Usuario y Contraseña'); ?></legend>
     	     <?php echo $this->Form->input('email');
        		   echo $this->Form->input('password');
    ?>
    </fieldset>
    	<?PHP echo $this->Html->link(__('Registrarte'), 
    			array('controller'=> 'Usuarios', 'action' => 'add')); ?>
		<?php echo $this->Form->end(__('Ingresar')); ?>
		
		 
</div>