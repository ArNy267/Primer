
<div class="">
  <div class="row-fluid">
    <div class="container pad">
      <div class="span3"> 


        <div class="actions">

          <div class="member-box">
            <div class="thumbnails"> <?php echo $this->html->image('left-man-img.jpg'); ?> </div>
            <div class="mebber-disc">
              <h3> <?php echo $usuario_logged_nombre.''.$usuario_logged_apellido; ?></h3>
              <p>  <?php echo h($usuario['Usuario']['descripcion']); ?> </p>
                <span class="fivstar"> <?php echo $this->html->image('star.jpg'); ?></span> <br>
                <?PHP  echo $this->Html->Link(__('Editar mi perfil'), array(
                'controller' => 'usuarios', 'action' => 'edit',$usuario_logged_id))  ?> 
            </div>

          </div>

              <div class="left-nav">
                <ul class="left-menu">
                  <li class="left-menu1 active"><a href="#"><i></i>Propixia</a></li>
                  <li class="left-menu2 "><a href="#"><i></i> BNS Mexico</a></li>
                  <li class="left-menu3"><a href="#"><i></i> ICCS</a> </li>
                  <li class="left-menu4"><a href="#"><i></i> IOS Offices</a> </li>
                  <li class="left-menu5"><a href="#"><i></i> Claut</a> </li>
                  <li class="left-menu6"><a href="#"><i></i> Webpoint</a> </li>
                </ul>
              </div>
              <div class="newsletter">
                <h4>Mi red de contactos</h4>
                <div>
                  <input type="text" class="textbox" placeholder="Buscar Contactos">
                  <input type="submit" class="" value="Buscar">
                </div>
              </div>
              <div class="frd-box"> <span><img src="images/frd-img1.jpg" alt=""/></span> <span><img src="images/frd-img2.jpg" alt=""/></span> <span><img src="images/frd-img3.jpg" alt=""/></span> <span><img src="images/frd-img4.jpg" alt=""/></span> <span><img src="images/frd-img5.jpg" alt=""/></span> <span><img src="images/frd-img6.jpg" alt=""/></span> <span><img src="images/frd-img7.jpg" alt=""/></span> <span><img src="images/frd-img8.jpg" alt=""/></span> <span><img src="images/frd-img9.jpg" alt=""/></span> </div>
              <div class="mis-pro">
                <h4>Mis proyectos</h4>
                <input type="text" class="textbox" placeholder="Proy">
                <div class="mis-pro-list"> Proyecto<br>
                  Proyectos <br>
                  Proyeccion <br>
                  Proyectado <br>
                  Proyectar <br>
                </div>
                <span class="greensmall">Ver todos mis proyectos</span> 
              </div>

      
                      </div>
                    </div>

                    <div class="span9">
                      <!-- AGREGAR SKILL -->

                      <div style="float:left">
                        <?php if ($id == $this->Session->read('Usuario.id')) {  ?>
                        <?php echo $this->Html->link(__('Agregar skill'), array(
                        'controller' => 'skilles', 'action' => 'add' )); ?> 
                        <?php } ?>
                      </div> 

                      <!-- TIPO DE RELACION. (CONEXION). -->

                      <div style="float:right">

                        <?PHP  

                        if($id != $this->Session->read('Usuario.id')){

                          if (!$MisConexiones == '') {

                            if($MisConexiones[0]['conexiones']['aceptado'] != 0){

                              echo "<h3> Conexion Aceptada </h3> "; 

                            }

                            elseif($this->Session->read('Usuario.id') == $MisConexiones[0]['conexiones']['usuarios_id1']){ 

                              echo "<h3> Tu solicitud de amistad esta pendiente</h3> "; 

                            } else {
                              echo "<h3> Conexion solicitada </h3> "; 
                            }

                          }

                          else {

                            echo $this->Html->link(__('Conectar'), array( 'controller' => 'Usuarios',
                              'action' => 'conectar', $usuario['Usuario']['id'], $usuario_logged_id)); 
                          }
                        }
                        ?>
                      </div>
                      <div style="clear:both"> </div>
                      <h2><?php echo __('Usuario'); ?></h2>
                      <br>
                      <dl>
                        <dt> <?php echo __('Id'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['id']); ?> &nbsp;  </dd>
                        <dt> <?php echo __('Nombre'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['nombre']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Apellido'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['apellido']); ?>  &nbsp; </dd>
                        <dt> <?php echo __('Email'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['email']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Password'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['password']); ?>  &nbsp;  </dd>
                        <dt> <?php echo __('Puesto'); ?></dt> 
                        <dd> <?php echo h($usuario['Usuario']['puesto']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Descripcion'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['descripcion']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Calificacion'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['calificacion']); ?>  &nbsp;  </dd>
                        <dt> <?php echo __('Created'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['created']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Modified'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['modified']); ?>  &nbsp; </dd>
                        <dt> <?php echo __('Activo'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['activo']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Validado'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['validado']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Empresa Id'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['empresa_id']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Ciudad Id'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['ciudad_id']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Industria Id'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['industria_id']); ?>&nbsp;  </dd>
                        <dt> <?php echo __('Telefono'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['telefono']); ?> &nbsp;</dd>
                        <dt> <?php echo __('Movil'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['movil']); ?> &nbsp; </dd>
                        <dt> <?php echo __('Direccion'); ?></dt>
                        <dd> <?php echo h($usuario['Usuario']['direccion']); ?> &nbsp; </dd>
                      </dl>
                      <br>
                    </div>
                  </div>
                </div>
              </div>


              <div class="usuarios view"> 

              </div>
