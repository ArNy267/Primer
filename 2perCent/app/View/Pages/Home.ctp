<style>

#wpt-contenido h3{
 
	text-align: center;

}

</style>

	<div id="wpt-contenido">
	<h3>Gaxioma</h3>
	<p>Bienvenido <?php echo $loged['nombre'] ?></p>
	<?php echo $this->Html->link(__('Salir'), 
			array( 'controller' => 'Usuarios', 'action' => 'logout'));  ?> <br><br>
	<?php $urli= 'http://localhost:8888/LuisDuran/' ?>
	<ul id="menu">
		<li><a href="<?PHP echo $urli.'Ciudades' ?>">Ciudades</a></li>
		<li><a href="<?PHP echo $urli.'Empresas' ?>">Empresas</a></li>
		<li><a href="<?PHP echo $urli.'Estados' ?>">Estados</a></li>
		<li><a href="<?PHP echo $urli.'Industrias' ?>">Industrias</a></li>
		<li><a href="<?PHP echo $urli.'Mensajes' ?>">Mensajes</a></li>
		<li><a href="<?PHP echo $urli.'Monedas' ?>">Monedas</a></li>
		<li><a href="<?PHP echo $urli.'Negociaciones' ?>">Negociaciones</a></li>
		<li><a href="<?PHP echo $urli.'Paises' ?>">Paises</a></li>
		<li><a href="<?PHP echo $urli.'skilles' ?>">skilles</a></li>
		<li><a href="<?PHP echo $urli.'Solicitudes' ?>">Solicitudes</a></li>
		<li><a href="<?PHP echo $urli.'Usuarios' ?>">Usuarios</a></li>
		<li><a href="<?PHP echo $urli.'UsuariosSkilles' ?>">UsuariosSkills</a></li>
		
	</ul>

	<div >
		<div id="perfil">

			<?php
				//Debugger::dump($usr);

				/*$usuarios = $this->requestAction(array('controller' => 'Usuarios', 'action' => 'index')); 
				Debugger::dump($usuarios); */
	          
	          # Para obtener toda la lista de usuarios.
	       /*    if (is_array($usr))
				{
				    
				 foreach($usr as $item):  ?>
	                <div class="step" >
	                    <div class="jms-content">
	                         <p><h3><?php echo $item['Usuario']['nombre']; ?> &nbsp;
	                       <?php echo $item['Usuario']['apellido']; ?></h3> </p>
	                    </div>	                    
	                </div>
	      <?php endforeach;

	            } else { 
	            	echo "problemas con variable"; 
	            	
	            	}  */
	          
	            if($atributos != "null" && $atributos != '' ){	
	            foreach($atributos as $item): ?>

	            <div class="step" data-color="color-1" data-x="2000" data-y="1000" data-z="3000" data-rotate="-20">
	                    <div class="jms-content">
	                         <p><h3><?php echo $item['Usuario']['nombre']; ?> &nbsp;
	                       <?php echo $item['Usuario']['apellido']; ?></h3> </p>
	                    </div>
	                    <!-- <img src="/img/bannerimages/<?php echo $item['Usuario']['nombre']; ?>" /> -->
	                </div>
	            <?php endforeach; }

	              if($atributos == ''){ echo "<p> <h4>No se encontraron, resultados de tu busqueda!</h4> </p>";}

	             ?>

		</div>

		<div id="amigos">
			 		   <?php echo $this->Session->flash('auth'); ?>
			 		   <?php echo $this->Form->create('Busqueda'); ?>
            <fieldset> <?php echo $this->Form->input('Buscar');?> </fieldset>
				   	   <?php echo $this->Form->end(__('Buscar')); ?>
		</div>

		<div id="proyectos">
		</div>
	</div>

	<div>
		<div id="">
		</div>
		<div>
		</div>


	</div>
</div>