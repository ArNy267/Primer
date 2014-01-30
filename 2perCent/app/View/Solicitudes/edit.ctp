<div class="solicitudes form">

	<?php  echo $this->Form->input('Solicitud.id',array('type' => 'hidden', 'value' => $SolicitudFindList[0]['Solicitud']['id']) );        
		//echo $this->Form->input('id', array('type' => 'text', 'value' => $id ));
                    $sizes = array('1' => 'Publica', '0' => 'Privada');
                echo $this->Form->input('Privacidad', array('options' => $sizes, 'default' => '1'));
		echo $this->Form->input('usuario_id',  array('type' => 'hidden', 'value' => $usuario_logged_id ));
                  // foreach($SolicitudFindList as $item ){
                  
                            echo '<div class="input text"> <label for="SolicitudTitulo">Titulo</label>';
                            echo '<input id="SolicitudTitulo" type="text" value="'.$SolicitudFindList[0]['Solicitud']['Titulo'].'" name="data[Solicitud][titulo]">';
                            echo '</div>';
                            echo '<div class="input text"> <label for="SolicitudDescripcion">Descripcion</label>';
                            echo '<input id="SolicitudDescripcion" type="text" value="'.$SolicitudFindList[0]['Solicitud']['Descripcion'].'" name="data[Solicitud][descripcion]">';
                            echo '</div>';

                                 //} 
//		echo $this->Form->input('titulo');
//		echo $this->Form->input('descripcion');
		echo $this->Form->input('Solicitud.monto');
                echo $this->Form->input('Solicitud.comision');
                echo $this->Form->input('Solicitud.vencimiento');
                echo $this->Form->input('Solicitud.moneda_id');
                echo $this->Form->input('Solicitud.industria_id');
                echo $this->Form->input('Solicitud.status',  array('type' => 'hidden', 'value' => 0 ));
	?>
<!--	</fieldset>-->
<?php // echo $this->Form->end(__('Submit')); ?>
</div>
