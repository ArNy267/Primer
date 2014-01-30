
<?php // url: echo Router::url(array('controller'=>'Solicitudes','action'=>'edit/'.$item['Solicitud']['id']));?>
<div class="modal-body">
<script>
                      

  $('#solicita').on('change', function() {  
  
  var Date = $('#solicita').val();
    var elem = Date.split(',');
    claveNeg = elem[0];
    claveSol = elem[1];
    
      
  //var claveSol = $('#solicita').val(); 
  var user = <?php echo $usuario_logged_id; ?>;
  

  
    alert('mi clave de la solicitud es'+ claveSol+' y la otra es'+claveNeg );
 
  /* $.ajax({
    url:"/LuisDuran/Solicitudes/edit/"+ claveSol +"/",  // url: '/types/fetch/original',
    cache: false,
    type: 'GET',
    dataType: 'HTML',
    success: function (data) {
      $("#div1").html(data); //  $('#context).html(data);
    }
}); */

    if(claveSol == '0'){
       $.ajax({
          dataType: "html",
          type: "GET",
          evalScripts: true,
          url:"/LuisDuran/Solicitudes/add",
          data: ({type:'original'}),
          success: function (data, textStatus){
              $("#div1").html(data);
              $('#NegociacionParentId').val(claveSol);
         
          }
      }); 
    $('#NegociacionParentId').val('0');
    } else {
 
   $.ajax({
          dataType: "html",
          type: "GET",
          evalScripts: true,
          url:"/LuisDuran/Solicitudes/edit/"+claveSol+"/"+user+"/"+claveNeg+"/",
          data: ({type:'original'}),
          success: function (data, textStatus){
              $("#div1").html(data);
              $('#NegociacionParentId').val(claveNeg);  

          }
      }); 
      
      //$('#NegociacionParentId').val(claveNeg);
  }


  });  

$('#closeModal').on('click', function(){
    // $(this).remove();
     $(this).removeData('#myModal');
    
});

 </script>

                

<div> <!-- Negociaciones realizadas con el usuario. -->  

      <?php echo $this->Form->create(); ?>
    
      <?PHP if($Negocios != '' &&  $Negocios != null) {  ?>
                <div style="margin: 5px 0 ">
                    <!--    <h3> Negociacion que coincide con esta relacion. </h3>-->
                    <ul> 
                        
                    </ul>
                </div>
<!--                Un select de las negociaciones-->
                    <select id='solicita'  name='data[Negociacion][solicitud_id]' >
                     <?php  foreach ($Negocios as $item) {  
                         
                            echo '<option value='.$item['Negociacion']['id'].','.$item['Solicitud']['id'].'> '.$item['Solicitud']['titulo'].' </option>';
                           
                     }?>
                                  <option value='0'> Nueva Solicitud </option>
                    </select>
                        <?php  echo $this->Form->input('Negocios', array('type' => 'hidden', 'value' => $item['Solicitud']['id']));  ?>
<!--                   un select de las solicitudes
                <select id='solicita'  name='data[Negociacion][solicitud_id]' >
                     <?php  foreach ($solicitudes as $item) {  
                         
                            echo '<option value='.$item['Negociacion'][0]['id'].'> '.$item['Solicitud']['titulo'].' </option>';

                     }?>
                                  <option value='0'> Nueva Solicitud </option>
                </select> -->
                              <a style="float:none" class=" close accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            +
                        </a>  
    <h2> Solicitud </h2>
                
                <div class="accordion" id="accordion2">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        
                    </div>
                    <div id="collapseOne" class="accordion-body collapse">
                        <div class="accordion-inner"> 
                            
                <div id='div1'>  
                    <div class="solicitudes form">
                        
                        <?php  
                        echo $this->Form->input('Negociacion.parent_id',array('type' => 'text', 'value' => $SolicitudFindList[0]['Negociacion'][0]['id']) );
                                $sizes = array('1' => 'Publica', '0' => 'Privada');
                        echo $this->Form->input('Solicitud.Privacidad', array('options' => $sizes, 'default' => '1'));
                        echo $this->Form->input('Solicitud.usuario_id',  array('type' => 'hidden', 'value' => $usuario_logged_id ));

                  
                            echo '<div class="input text"> <label for="SolicitudTitulo">Titulo</label>';
                            echo '<input id="SolicitudTitulo" type="text" value="'.$SolicitudFindList[0]['Solicitud']['Titulo'].'" name="data[Solicitud][titulo]">';
                            echo '</div>';
                            echo '<div class="input text"> <label for="SolicitudDescripcion">Descripcion</label>';
                            echo '<input id="SolicitudDescripcion" type="text" value="'.$SolicitudFindList[0]['Solicitud']['Descripcion'].'" name="data[Solicitud][descripcion]">';
                            echo '</div>';

                        echo $this->Form->input('Solicitud.monto');
                        echo $this->Form->input('Solicitud.comision');
                        echo $this->Form->input('Solicitud.vencimiento');
                        echo $this->Form->input('Solicitud.moneda_id');
                        echo $this->Form->input('Solicitud.industria_id');
                        echo $this->Form->input('Solicitud.status',  array('type' => 'hidden', 'value' => 0 ));
                            ?>
 
            
                
             <?php  } else {   ?>

            
                <h3> Agregar Nueva Solicitud. </h3>

                   <?php
                                $sizes = array('1' => 'Publica', '0' => 'Privada');
                        echo $this->Form->input('Solicitud.Privacidad', array('options' => $sizes, 'default' => 1));
                        //echo $this->Form->input('privacidad', array( 'type' =>	'select', 'value' => '0,1' ));
                        echo $this->Form->input('Solicitud.usuario_id',  array('type' => 'hidden', 'value' => $usuario_logged_id ));
                        //echo $this->Form->input('usuario_id');
                        echo $this->Form->input('Solicitud.titulo');
                        echo $this->Form->input('Solicitud.descripcion');
                        echo $this->Form->input('Solicitud.monto');
                        echo $this->Form->input('Solicitud.comision');
                        echo $this->Form->input('Solicitud.vencimiento');
                        echo $this->Form->input('Solicitud.moneda_id');
                        echo $this->Form->input('Solicitud.industria_id');
                        echo $this->Form->input('Solicitud.status',  array('type' => 'hidden', 'value' => 0 ));
                           
                        }  ?>
                     
                   </div>
                </div>
           </div>
        </div>
    </div>      
</div>  
	<?php
		echo $this->Form->input('Negociacion.mensaje');
                //echo $this->Form->input('Negociacion.parent_id', array('type' => 'text', 'value' => '' ));
		echo $this->Form->input('Negociacion.parent_id', array('type' => 'text', 'value' => $SolicitudFindList[0]['Solicitud']['id']));         
		echo $this->Form->input('Negociacion.usuario_id',  array('type' => 'hidden', 'value' => $usuario_logged_id )); 
		echo $this->Form->input('Negociacion.usuario_id2',  array('type' => 'hidden', 'value' => $id ));
		echo $this->Form->input('Negociacion.status',array('type' => 'hidden', 'value' => 0 ));
               ?>
	
            <?php echo $this->Form->end(__('Guardar')); ?>
          
    </div>
</div>
