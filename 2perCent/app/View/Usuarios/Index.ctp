<style>
    #Solicituds{
        margin: 25px 0;
    }
    
    #Solicituds .title{
        background: none repeat scroll 0 0 #F8FEFE;
        padding: 2px 0;
        width: 100%;
        
    }
</style>
    <div class="span3">
        <!--     <ul>
              <li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
              <li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
              <li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
              <li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
            </ul> -->

            <!-- solicitudes  -->

            <div class="accordion" id="accordion">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <h3>  Solicitudes  </h3>
                  </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse">
                  <div class="accordion-inner">
                      <div class="left-nav">
                        <h4><?php echo $this->Html->link(__('Nueva Solicitud'), array(
                            'controller' => 'solicitudes', 'action' => 'add',$usuario_logged_id )); ?></h4>   
                        <ul class="left-menu">
                                             
                       
                        <?php if($SolicitudPanelCentral != ''){
                            
                          foreach ($SolicitudPanelCentral as $item){ ?>

                          <?PHP if($item['Solicitud']['usuario_id'] == $usuario_logged_id ) {   
                                    echo '<li class="left-menu4">';
                                    echo $this->Html->link(__($item['Solicitud']['titulo']), array(
                                     'controller' => 'Solicitud', 'action' => 'view',$item['Solicitud']['id'] ));
                                    echo '</li>';
                                 } } } ?> 
<!--                        
                          <li class="left-menu1 active"><a href="#"><i></i>Propixia</a></li>
                          <li class="left-menu2 "><a href="#"><i></i> BNS Mexico</a></li>
                          <li class="left-menu3"><a href="#"><i></i> ICCS</a> </li>
                          
                          <li class="left-menu4"><a href="#"><i></i> IOS Offices</a> </li>
                          
                          <li class="left-menu5"><a href="#"><i></i> Claut</a> </li>
                          <li class="left-menu6"><a href="#"><i></i> Webpoint</a> </li>-->
                        </ul>
                      </div>
 
                    </div>
                  </div>
                </div>


            </div>
            
            <div class="accordion" id="accordion2">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTow">
                    <h3>  Conexiones  </h3>
                  </a>
                </div>
                <div id="collapseTow" class="accordion-body collapse">
                  <div class="accordion-inner">
                       <div class="newsletter">
                              <h4>Mi red de contactos</h4>
                            <div>
                             <input type="text" class="textbox" placeholder="Buscar Contactos">
                             <input type="submit" class="" value="Buscar">
                            </div>
                        </div>
                        
                      <h3>  Enviadas. </h3> 
                      <ul>

                      <?php if($solicitudes != '') { 

                        foreach ($solicitudes as $item) { ?>

                        <?PHP if($item['Conexion']['aceptado'] == 0) {   

                          if($item['Usuarios1']['id'] != $usuario_logged_id ){
                              
                               echo $this->Html->image("/images/contacto.jpg", array(
                                       "alt" => $item['Usuarios1']['nombre'].' '.$item['Usuarios1']['apellido'],
                                       'url' => array('controller' => 'Usuarios', 'action' => 'view',$item['Usuarios1']['id'])
                                   ));
                          }

                        } } }?> 
                        
                      </ul>
                     

                      <h3>  Recividas. </h3>
                      <ul>
                        <?php if($solicitudes != '') { 

                          foreach ($solicitudes as $item) { ?>

                          <?PHP if($item['Conexion']['aceptado'] == 0) {   

                            if($item['Usuarios']['id'] != $usuario_logged_id ){

                                echo $this->Html->image("/images/contacto.jpg", array(
                                       "alt" => $item['Usuarios']['nombre'].' '.$item['Usuarios']['apellido'],
                                       'url' => array('controller' => 'Conexiones', 'action' => 'Aceptar',$item['Usuarios']['id'])
                                   ));


                                }

                          } } }?> 

                        </ul>
                        

                        <h3> Amigos </h3>
                        <div class="frd-box">
                          <?php if($solicitudes != '') { 
                              $i=1;
                            foreach ($solicitudes as $item) { ?>
                                
                            <?PHP if($item['Conexion']['aceptado'] == 1) {   

                              if($item['Usuarios']['id'] != $usuario_logged_id ){
                                 //   <!--    Amigos Usuarios con imagenes-->
                                echo '<span>';
                                echo $this->Html->image("/images/frd-img$i.jpg", array(
                                       "alt" => $item['Usuarios']['nombre'].' '.$item['Usuarios']['apellido'],
                                       'url' => array('controller' => 'Conexiones', 'action' => 'Aceptar',$item['Usuarios']['id'])
                                   ));
                                 echo '</span>';
//                                echo $this->Html->link(__($item['Usuarios']['nombre'].' '.$item['Usuarios']['apellido']), array(
//                                       'controller' => 'Conexiones', 'action' => 'Aceptar',$item['Usuarios']['id']));
//                                echo '<br /><br />';

                              }

                              if($item['Usuarios1']['id'] != $usuario_logged_id ){
                                   echo '<span>'; 
                                   echo $this->Html->image("/images/frd-img$i.jpg", array(
                                    "alt" => $item['Usuarios']['nombre'].' '.$item['Usuarios']['apellido'],
                                    'url' => array('controller' => 'Usuarios', 'action' => 'view',$item['Usuarios1']['id'])
                                ));
                                   echo '</span>';
//                                echo $this->Html->link(__($item['Usuarios1']['nombre'].' '.$item['Usuarios1']['apellido']), array(
//                                          'controller' => 'Usuarios', 'action' => 'view',$item['Usuarios1']['id']));
//                                echo '<br /><br />';

                                 }
                                 
                              $i++;   
                            } } }?> 

                          </div>
                      <!--   
                          <div class="frd-box">  <span><img src="images/frd-img1.jpg" alt=""/></span>  <span><img src="images/frd-img2.jpg" alt=""/></span> <span><img src="images/frd-img3.jpg" alt=""/></span> <span><img src="images/frd-img4.jpg" alt=""/></span> <span><img src="images/frd-img5.jpg" alt=""/></span> <span><img src="images/frd-img6.jpg" alt=""/></span> <span><img src="images/frd-img7.jpg" alt=""/></span> <span><img src="images/frd-img8.jpg" alt=""/></span> <span><img src="images/frd-img9.jpg" alt=""/></span> </div>
                          -->

                  </div>
                </div>
              </div>

            </div>

            <div class="accordion" id="accordion3">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseTree">
                     <h3>Negociaciones</h3>
                  </a>
                </div>
                <div id="collapseTree" class="accordion-body collapse">
                  <div class="accordion-inner">
                   
                  <!-- Negocios -->

                 
                  <div style="margin: 5px 0 ">
                    <h5> solicitadas </h5>
                    <div class="left-nav">
                            <ul class="left-menu">
                            <?php foreach ($Negocios as $item) { 

                                if ($item['Negociacion']['usuario_id'] == $usuario_logged_id && 
                                  $item['Negociacion']['parent_id'] == 0 ) { ?>


                                 <li class="left-menu2 "> <?php echo $this->Html->link(__( $item['Usuario2']['nombre'].' '.$item['Usuario2']['apellido']), array(
                                  'controller' => 'Negociaciones', 'action' => 'view', $item['Negociacion']['id']  
                                  ));?>
                                 </li>
     
                            <?php } } ?>   

                            </ul>
                          </div>
                    <ul>
                      <?php foreach ($Negocios as $item) { 

                        if ($item['Negociacion']['usuario_id2'] == $usuario_logged_id && 
                          $item['Negociacion']['parent_id'] == 0 ) { ?>

                          <li> <?php echo $this->Html->link(__( $item['Usuario']['nombre'].' '.$item['Usuario']['apellido']), array(
                            'controller' => 'Negociaciones', 'action' => 'view', $item['Negociacion']['id']  
                            ));?>

                          </li>

                      <?php }}  ?>
                     
                        </ul>
                      </div>

                      <h5>Enviadas</h5>
                      <div style="margin: 5px 0 ">
                          <div class="left-nav">
                            <ul class="left-menu">
                            <?php foreach ($Negocios as $item) { 

                                if ($item['Negociacion']['usuario_id'] == $usuario_logged_id && 
                                  $item['Negociacion']['parent_id'] == 0 ) { ?>


                                 <li class="left-menu2 "> <?php echo $this->Html->link(__( $item['Usuario2']['nombre'].' '.$item['Usuario2']['apellido']), array(
                                  'controller' => 'Negociaciones', 'action' => 'view', $item['Negociacion']['id']  
                                  ));?>
                                 </li>
     
                            <?php } } ?>   

                            </ul>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>
    <div class="span9">
        <div class="row-fluid">
          <div class="grey-container">
            <h1> Necesidades Publicadas </h1>
            <?php foreach( $SolicitudPanelCentral as $item){ ?>
            <div id='Solicituds'>
                <?php echo '<div class="title"> Titulo:'.$item['Solicitud']['titulo'].'</div>' ?>
                <?php echo '<div> '.$item['Solicitud']['descripcion'].' </div> ' ?>
                
            </div>
                
                
            <?php } ?>

          </div>
        </div>
    </div>
