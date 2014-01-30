 <div class="spanfull">
        <div class="row-fluid">
          <div class="grey-container">
            <h1>Agregar Necesidad</h1>
            <div class="first-table">
                <?php   
		//echo $this->Form->input('privacidad', array( 'type' =>	'select', 'value' => '0,1' ));
		echo $this->Form->input('usuario_id',  array('type' => 'hidden', 'value' => $usuario_logged_id ));
		//echo $this->Form->input('usuario_id');

		echo $this->Form->input('status',  array('type' => 'hidden', 'value' => 0 )); //echo $this->Form->input('status');
                ?>
              <table width="100%" border="0" align="center">
                <tr>
                  <td><span>Nombra tu proyecto/Necesidad</span>
                    <div>
                     <?php echo $this->Form->input('titulo', array('type'=> 'text', 'label'=> false)); ?>
                    </div>
                  </td>
                  <td><span><strong>Sector </strong><span class="bluesmall"> Giro o sector al que pertenece tu necesidad</span></span>
                    <div>
                        <?php echo $this->Form->input('industria_id', array('class' => 'listing-box2' , 'id' => 'listing-box','label'=> false ));  ?>
                      
                        
                    </div></td>
                </tr>
                  <tr>
                    <td>  
                        <span></span>  
                    </td>
                  <td><span><strong>Privacidad </strong><span class="bluesmall"> </span></span>
                    <div>
                        <?php       $sizes = array('1' => 'Publica', '0' => 'Privada');
                        
                        echo $this->Form->input('Privacidad', array('options' => $sizes, 'default' => '1', 'label' => false));
                        
                        //echo $this->Form->input('industria_id', array('class' => 'listing-box2' , 'id' => 'listing-box','label'=> false ));  ?>
                      
                        
                    </div></td>
                </tr>
                <tr>
                  <td colspan="2"><span>Descripción corta</span>
                    <div>
                      <?php echo $this->Form->input('descripcion', array('type'=> 'textarea', 'class'=> 'full-width', 'label' => false )); ?>
                      
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><span>Monto del Proyecto <span class="bluesmall"> Opcional</span></span>
                    <div>
                     <?php echo $this->Form->input('monto', array('type' => 'text', 'label'=> false)); ?>
                    </div>
                  </td>
                  <td><span>Moneda</span>
                    <div class="che-box">
                        <?php echo $this->Form->input('moneda_id', array('type' => 'checkbox', 'label' => false )); ?>
                        <?php  ?>
<!--                      <label>
                        
                        MXN </label>
                      <label>
                        <input type="checkbox" name="CheckboxGroup1_" value="checkbox" id="CheckboxGroup1_1">
                        USD</label>-->
                    </div>
                  </td>
                </tr>
                <tr>
                    <td><span>Comicion</span><?php echo $this->Form->input('comision', array('type' => 'text', 'label' => false)); ?>   </td>
                    
                <tr>
                  <td>
                    <spa> Fecha de Vencimiento <span class="bluesmall"> Opcional</span> </spa>
                    <div>
                      <?php echo $this->Form->input('vencimiento', array('type' => 'text', 'class' => 'calender', 'label' =>  false)); ?>
<!--                        <input type="datetime" class="calender">-->
                      
                    </div>
                  </td>
                    <!--  <td><span>Fecha de vencimiento  Opcional</span>
                            <div>
                              <input type="datetime" class="calender">
                            </div>
                      </td> -->
                </tr>
              </table>
            </div>

            
          </div>
        </div>
 
 
 </div>
	
                

