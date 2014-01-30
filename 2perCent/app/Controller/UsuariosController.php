<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent','Controller/Usuarios ');
/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 */
class UsuariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
/**
 * index method
 *
 * @return void
 */
 public function index(){
		
	  	$uid = $this->Session->read('Usuario.id');

		##### Para mi lista de amigos y En espera de respuesta.
                
		$solicitudes = $this->Usuario->Conexion->find('all', array(
			  	'conditions' => array(
                                            'OR' => array(
                                        array('usuarios_id1' =>  $uid),
                                        array('usuarios_id' =>  $uid),

			        		)
			  		),
                                'fields' => array('Conexion.*', 
                                                    'Usuarios.id',
                                                    'Usuarios.nombre', 
                                                    'Usuarios.apellido', 
                                                    'Usuarios1.id',
                                                    'Usuarios1.nombre', 
                                                    'Usuarios1.apellido'
                                                )
			    	));	
                  
		/**
		 Vemos las solicitudes enviadas y recibidas.  (Amigos)			
		**/ 


		$Negocios = $this->Usuario->Negociacion->find('all', array(
				'fields' => array(
						'Negociacion.usuario_id',
						'Negociacion.usuario_id2',
						'Negociacion.parent_id',
						'Usuario.nombre',
						'Usuario.apellido',
						'Usuario2.nombre',
						'Usuario2.apellido',
						'Solicitud.id',
					),
				'conditions' => array( 
							'OR' => array(
								'Negociacion.usuario_id' => $uid,
								'Negociacion.usuario_id2' => $uid,
							),
							'AND' => array(

								'Negociacion.parent_id' => 0,
							)
						)
			));
                $SolicitudPanelCentral = $this->Usuario->Solicitud->find('all',array(
                        'conditions' => array( 
                            'Solicitud.privacidad' => 0,
                        ),
                        'fields' => array(
                              'Solicitud.titulo',
                              'Solicitud.descripcion',
                              'Solicitud.usuario_id'
                            
                            
                        )
                ));
                
               
		$this->set(compact('id','Negocios','solicitudes','SolicitudPanelCentral'));


 }

 public function buscar(){

		$usrLoged = $this->Session->read('Usuario.id');
	
		
		$solicita = $this->Usuario->Solicitud->find('all', array(
		 			'fields' => array(
		 				'Industria.nombre',
		 				)
		 		));

		$this->set('BusquedaUsuario');
		$this->set('Myuid');
		$this->set('AmigosSkilles');
		$this->set('MyAuid');
		$this->set('ComparaAmigos');
		$this->set('Skilleses');
		$this->set('filtro');

		 # Inicio de la busqueda ....
		 if($this->request->is('post')){

                    $Buscar = $this->request->data['Busqueda']['Buscar'];

                    if(!empty($Buscar)) { /**  
						BUSQUEDA DE USUARIOS   
					**/ 
                        $BusquedaUsuario = $this->Usuario->find('all', array(
                                'conditions'=> array(
                                    'AND' => array(
                                            'Usuario.nombre LIKE' => '%'.$Buscar.'%',
                                            'Usuario.id !=' => $usrLoged, 
                                            )
                                    ),
                                'fields' => array(
                                                'Usuario.id',
                                                'Usuario.nombre',
                                                'Usuario.apellido'
                                                        )

                        ));

                            if(!empty($BusquedaUsuario)){ 

                                $this->set(compact('BusquedaUsuario'));

                                return true;
                             }

			        else { /**
		         			#Si no encuentra en ningun Usuario.....	  
		        		   **/ 
			        	
			        	#### BUSQUEDA EN PRIMER NIVEL...
				        ### Part III: Follows & Followers $Myuid Mis RElaciones   
                                            $Myuid =$this->Usuario->query( 
						"SELECT IF(usuarios_id = {$usrLoged}, usuarios_id1, usuarios_id)UiD, 
                                                    conexiones.usuarios_id, conexiones.usuarios_id1 
                                                        from conexiones   where (usuarios_id = {$usrLoged} or usuarios_id1 = {$usrLoged}) 
							  	 				AND aceptado = 1;");
					        
					        /* Mis Amigos */
	      					
			        		$uids = array();
								foreach($Myuid as $key){
								
							 		$uids[] = $key[0]['UiD']; 

							 		} 
							// echo "mis amigos";	debug($uids); 
							### Los skills de mis amigos    	
							$AmigosSkilles = $this->Usuario->UsuariosSkill->find('all', array(
							  	'conditions' => array(
							  		'AND' => array(
							  		 array('UsuariosSkill.usuario_id' => $uids),
							  		 array('Skill.nombre LIKE' => '%'.$Buscar.'%'),
							  		)),
							  	'fields' => array(
							  		'Usuario.nombre','Usuario.apellido','UsuariosSkill.*','Skill.nombre'
							  	),
							  	'contain' => true,
							)); 

							#### BUSQUEDA EN SEGUNDO NIVEL...
						/*
						*  Encuentro amigos de mis amigos con relacion  
						* de conexion y elimino la conexion conmigomismo por la info 
						* de los skills no aparesca la mia
						**/
							### AMIGOS DE MIS AMIGOS.

							if(!empty($uids)){
								$Amigos = array();
										
								foreach ($uids as $ItemAmigo ) {

								 $Amigos[] = $ItemAmigo['id']; 
								
								} 
								// esta funcion la Utilice solo para el Query siguiente.......
								$MisAmigos = implode(", ", $Amigos);  	//echo  http_build_query($Amigos);

								
							/**
							No hacer iner join con este Query por que tendria que juntar los dos campos usuario_id.
							*/	
								$MyAuid =$this->Usuario->query( 
									"SELECT  IF(usuarios_id  IN (".$MisAmigos."), usuarios_id1, usuarios_id )Uidt  
									  	 FROM conexiones  WHERE 
									  		(usuarios_id IN (".$MisAmigos .") or usuarios_id1 IN (".$MisAmigos .")) 
									  	 	AND aceptado = 1 and usuarios_id != ".$usrLoged." and usuarios_id1 != ".$usrLoged.";"
									  	 			);	  	
								
//								echo "Los amigos de los mios"; debug($MyAuid);  

								

							/* Sacamos los IDs de  los amigos de mis amigos*/ 

							$uidt = array();
							
							foreach ($MyAuid as $key){
							 		$uidt[] = $key[0]['Uidt'];
								} 
							
							//$uidt = implode(", ", $uidt ); 

							### AMIGOS Y LOS SKILLS DE SUS AMIGOS.
								

							$Skilleses = $this->Usuario->UsuariosSkill->find('all', array(
							  	'conditions' => array(
							  		'AND' => array(
							  			array('Skill.nombre LIKE' => '%'.$Buscar.'%'), 
							  			//array('UsuariosSkill.usuario_id !=' => $usrLoged, $uids),
							  			array('UsuariosSkill.usuario_id' => $uidt)
							  			
							  			)),
							  	'fields' => array(
							  			'Usuario.id', 'UsuariosSkill.*','Usuario.nombre',	'Usuario.apellido','Skill.nombre', 'Skill.id'
								  	)

							    ));	
							
//							 echo "Skilleses"; debug2($Skilleses); 


							$compara = $this->Usuario->find('all', array(
								'conditions' => array(
									'AND' => array(
										array('Usuario.id' =>  $uidt ),
										)
									),
								'fields' => array(
									)
								));

							$uidFilter = array();
							
							foreach ($Skilleses as $key){
							 		$uidFilter[] = $key['UsuariosSkill']['usuario_id'];
								} 
							//debug($compara);



							$filtro = $this->Usuario->Conexion->find('all',array(
									'conditions' => array(
										'OR' => array(
											array( 'usuarios_id' => $uids , $uidFilter ),
											array( 'usuarios_id1' => $uids, $uidFilter )

											),
										'AND' => array(
											array( 'usuarios_id !=' => $usrLoged  ),
											array( 'usuarios_id1 !=' => $usrLoged )

											)

										),
									'fields' => array(
										'Conexion.*',
										'Usuarios.id',
										'Usuarios.nombre',
										'Usuarios.apellido',
										'Usuarios1.id',
										'Usuarios1.nombre',
										'Usuarios1.apellido',
										)
								));

//							debug2($filtro);



							}  

							

							$options['conditions'] = array(
							 	'US.usuario_id' => 'usuario_logged_id');
							
							$this->paginate = $options; 
					        
					        $this->set(compact('Myuid','AmigosSkilles','MyAuid', 'ComparaAmigos','Skilleses', 'filtro', 'Buscar'));




					}

			 	} 

			 	  else { # Si  el campo de Busqueda esta vacio.

				 		echo $this->Session->setFlash("Busqueda invalida");

			 		} 
			 	
			 	//$this->set(compact('msj',$msj));

		 }   	



	 }

  public function indexed(){

  		$this->set('atributos', null);

  		$usuarioLoged = $this->Session->read('Usuario.id');
		$usr = $this->Usuario->find('all');
		$this->set(compact('usr')); //debugger::dump($param1);  //$this->set(compact('loged', $Loged)); 

		# Inicio de la busqueda ....
		if($this->request->is('post')){
			
			$Buscar = $this->request->data['Busqueda']['Buscar'];

			if(!empty($Buscar)){ #Si el campo de Busqueda no esta vacio.....

			   /**
	           BUSQUEDA DE USUARIOS
	           **/ 
					$BusquedaUsuario = $this->Usuario->find('all', 
		            		array('conditions'=> array(
		            			'AND' => array(
		            				'Usuario.nombre LIKE' => '%'.$Buscar.'%',
		            				'Usuario.id !=' => $usuarioLoged, 
		            				)
		            			)
		            		));

     				//debug($BusquedaUsuario);

		           	if(!empty($BusquedaUsuario)){ 
			               
			               $this->set(compact('BusquedaUsuario'));
			               return true;
		             }

		             else { 
					/**
	         			#Si no encuentra en ningun Usuario.....	  
	        		   **/ 

			             	
			             	 
			  	#### BUSQUEDA EN PRIMER NIVEL...
			             	
			             	$uid = $usuarioLoged;
			              	# Part III: Follows & Followers
			             		
			         		### $Myuid Mis RElaciones   
						  	 	$Myuid =$this->Usuario->query( "SELECT IF(usuarios_id = {$uid}, usuarios_id1, usuarios_id)UiD, conexiones.usuarios_id, conexiones.usuarios_id1 
						  	 					from conexiones where (usuarios_id = {$uid} or usuarios_id1 = {$uid}) AND aceptado = 1;");
				             	/* Obtenemos Relacion entre usuario de sesion y sus conexiones. */
				             	 
				             	debug($Myuid); 	
									$uids = array();
									foreach ($Myuid as $key){
								 		$uids[] = $key[0]['UiD'];
									} 
						
							### Los skills de mis amigos    	
								$markers = $this->Usuario->UsuariosSkill->find('all', array(
								  	'conditions' => array(
								  		 array('UsuariosSkill.usuario_id' => $uids),
								  		 array('Skill.nombre LIKE' => '%'.$Buscar.'%'),
								  		),
								  	'fields' => array(
								  		'Usuario.nombre','Usuario.apellido','UsuariosSkill.*','Skill.nombre'
								  	),
								  	'contain' => true,
								));  
								//debug2($Myuid); 


								$options['conditions'] = array(
								 	'US.usuario_id' => 'usuario_logged_id');
								
								$this->paginate = $options; 
	              
    			#### BUSQUEDA EN SEGUNDO NIVEL...
					/*
					*  Encuentro amigos de mis amigos con relacion  
					* de conexion y elimino la conexion conmigomismo por la info 
					* de los skills no aparesca la mia
					**/
						### AMIGOS DE MIS AMIGOS.

								if(!empty($markers)){ 
									$Amigos = array();
									
									foreach ($uids as $ItemAmigo ) {

										 	$i=0; $Amigos[] = $ItemAmigo['id']; $i++;
										 	
										 }   $MisAmigos= implode(", ", $Amigos);  	//echo  http_build_query($Amigos);

								  	 $MyAuid =$this->Usuario->query( "SELECT IF(usuarios_id  IN (".$MisAmigos."), usuarios_id1, usuarios_id )UIDs 
								  	 				FROM conexiones WHERE (usuarios_id IN (".$MisAmigos .") or usuarios_id1 IN (".$MisAmigos .")) 
								  	 					AND aceptado = 1 and usuarios_id != ".$uid." and usuarios_id1 != ".$uid.";"
								  	 			);
								  	 } //debug($MyAuid);
								
								$AmigosDLosMios = $this->Usuario->Conexion->find('all', array(
								  	'conditions' => array(// Que no sea YO.
								  		'AND' => array( array('aceptado' => 1) , array('usuarios_id  !=' => $usuario_id), array('usuarios_id1  !=' => $usuario_id),), // Solo mis amigos.
								  		'OR' => array( array('usuarios_id' =>  $uids), array('usuarios_id1' => $uids), )),
									  	'fields' => array( 'Conexion.*', 'Usuarios.id', 'Usuarios1.id' )
								    ));	
								
								#1 de AmigosDLosMios  agarro Conexion->Usuarios_id && Usuarios_id1.

						### Busqueda de Skills en general.
								// 1 que no sea ni mio ni de mis amigos.
								// 2 y obtener el ID de los usuarios encontrados.
								// 3 comparar que tengan relacion con mis amigos.

						
						### AMIGOS Y LOS SKILLS DE SUS AMIGOS.
							

								$Skilleses = $this->Usuario->UsuariosSkill->find('all', array(
								  	'conditions' => array(
								  		'AND' => array(
								  					array(
								  						'Skill.nombre LIKE' => '%'.$Buscar.'%', 
								  						'UsuariosSkill.usuario_id !=' => $uid,
								  						'UsuariosSkill.usuario_id !=' => $uids),

								  			
								  			)),
								  	'fields' => array(
								  			'UsuariosSkill.*','Usuario.nombre',	'Usuario.apellido','Skill.nombre', 'Skill.id'
									  	)

								    ));	
								//debug($Skilleses);  

						#### Comparar que los Skills encontrados esten relacionados con los amigos de mis amigos.
								$idSkillFinded = array();
								foreach ($Skilleses as $ItemSkill){
							 		$idSkillFinded[] = $ItemSkill['UsuariosSkill']['usuario_id'];
								}

								/*Mis Relaciones skills de mis amigos */   	
								$idsSusAmigos= implode(", ", $idSkillFinded);  	
								$AmigosMios= implode(", ", $uids);

								if(!empty($Skilleses)){ 
										 
								/* De esos Skills obtenidos comparo el id con los amigos de mis amigos  */
								$idsAdmA =$this->Usuario->query( 
									"SELECT IF(usuarios_id  IN  ({$idsSusAmigos}), usuarios_id1, usuarios_id )iudt, conexiones.*, 
				  	 						usuarios.nombre, usuarios.apellido, usuarios.id, skills.* from conexiones 
				  	 						INNER JOIN usuarios ON 
				  	 						(usuarios.id = conexiones.usuarios_id or usuarios.id = conexiones.usuarios_id ) 
				  	 						INNER JOIN usuarios_skills ON 
				  	 						(usuarios_skills.usuario_id = usuarios.id ) 
				  	 						INNER JOIN 	skills ON
				  	 						(usuarios_skills.skill_id = skills.id ) 

				  	 						WHERE (usuarios_id IN (".$idsSusAmigos .") AND usuarios_id1 IN (".$AmigosMios ."))
				  	 							OR (usuarios_id IN (".$AmigosMios .") AND usuarios_id1 IN (".$idsSusAmigos .")) 
				  	 							AND aceptado = 1 and usuarios_id != ".$uid." and usuarios_id1 != ".$uid.";");

									/*	$idsAdmA =$this->Usuario->query( "SELECT IF(usuarios_id  IN  ({$idsSusAmigos}), usuarios_id1, usuarios_id )iudt,
						  	 									usuarios.nombre, usuarios.apellido, usuarios.id from conexiones INNER JOIN usuarios ON 
						  	 									(usuarios.id = conexiones.usuarios_id or usuarios.id = conexiones.usuarios_id ) 
						  	 									WHERE (usuarios_id IN (".$idsSusAmigos .") AND usuarios_id1 IN (".$AmigosMios ."))
						  	 									OR (usuarios_id IN (".$AmigosMios .") AND usuarios_id1 IN (".$idsSusAmigos .")) 
						  	 						AND aceptado = 1 and usuarios_id != ".$uid." and usuarios_id1 != ".$uid.";"); */

								//debug2($idsAdmA);

								} 
								else {
									
									$idsAdmA=007;
								}		 	

							if(!empty($Skilleses) || !empty($markers) || !empty($idsAdmA) || !empty($Buscar)){ 	
					               $this->set(compact('Skilleses', $Skilleses)); 
					               $this->set(compact('markers', $markers));
					               $this->set(compact('idsAdmA', $idsAdmA));
					               $this->set(compact('Buscar', $Buscar));
					               
					               

					               return true;
				             }  
				             else { #Si no encuentra en ningun Usuario.....
		             	
			             		 $this->set('Skilleses', '');
			             		 $this->set('markers', '');
			             		 $this->set('idsAdmA', '');
			             		 $this->set('Buscar', '');
			             		 $this->set('Myuid');
			             		
					          }
									
					            
				      	   }	

					 }

					 else { # Aqui tenemos el campo vacio ....
					 		
					 	echo "<h2>Favor de ingresar informacion en la busqueda!!</h2>";
					 }
				}  

				else { # Aqui no tenemos post....
					
					 		
			}
			 
		$this->set(compact('atributos','BusquedaUsuario'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {

		if (!$this->Usuario->exists($id)) {
		throw new NotFoundException(__('Usuario invalido'));
		}
		
		$uid = $this->Session->read('Usuario.id');


		#### Otra forma de ver $MisConexiones....
		$Amigos =$this->Usuario->query("SELECT IF(usuarios_id = {$uid}, usuarios_id1, usuarios_id)UID, conexiones.* 
						  	 					FROM conexiones where (usuarios_id = {$id} or usuarios_id1 = {$id}) ;");
		/**
		Aqui temos error con este query, dependidendo de la info de la base de datos,				
		**/ //debug($Amigos);

		
		#### Para verificar que tengo coneccion con 
		$MisConexiones =$this->Usuario->query( "SELECT IF(usuarios_id = {$uid}, usuarios_id1, usuarios_id)UID, conexiones.aceptado,
											conexiones.usuarios_id1
						  	 					FROM conexiones where (usuarios_id = {$uid} and usuarios_id1 = {$id})
						  	 					OR (usuarios_id = {$id} and usuarios_id1 = {$uid} ) ;");
		/**
		 Para saber  que tipo de conexion tenemos...			
		**/ 

		if(!empty($MisConexiones )){ $this->set(compact('MisConexiones',$MisConexiones));} else { $this->set('MisConexiones',''); }

		#EndEstadodeConexion

		##### Para mi lista de amigos y En espera de respuesta.

		$solicitudes = $this->Usuario->Conexion->find('all', array(
			  	'conditions' => array(
			  		'OR' => array(
			            array('usuarios_id1' =>  $uid),
			            array('usuarios_id' =>  $uid),

			        		),
			  		),
				  	'fields' => array('Conexion.*', 
				  					'Usuarios.id',
				  					'Usuarios.nombre', 
				  					'Usuarios.apellido', 
				  					'Usuarios1.id',
				  					'Usuarios1.nombre', 
				  					'Usuarios1.apellido'
				         		)
			    	));	

		/**
		 Vemos las solicitudes enviadas y recibidas.  (Amigos)			
		**/ 


		$Negocios = $this->Usuario->Negociacion->find('all', array(
				'fields' => array(
						'Negociacion.usuario_id',
						'Negociacion.usuario_id2',
						'Negociacion.parent_id',
						'Usuario.nombre',
						'Usuario.apellido',
						'Usuario2.nombre',
						'Usuario2.apellido',
						'Solicitud.id',
					),
				'conditions' => array( 
							'OR' => array(
								'Negociacion.usuario_id' => $uid,
								'Negociacion.usuario_id2' => $uid,
							),
							'AND' => array(

								'Negociacion.parent_id' => 0,
							)
						)
			));

		if(!empty($solicitudes)){ 
			
			$this->set(compact('solicitudes',$solicitudes));

		  } else { 

		  		$this->set('solicitudes',''); 

				}
		
		$this->set(compact('id','Negocios'));

		$primer = array();
		$segund = array();
		$edo =array();

		if(in_array($id, $primer) || in_array($id, $segund) ) { $this->set('Amistad',true); } else { $this->set('Amistad',''); }
		
		if(in_array($id, $edo)) { /* $this->set('Amistad', false); */ }

		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	
	}


public function display() {

	      }


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

public function listado(){

		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->Paginator->paginate());

	}


public function Conectar($us=null, $id=null){

		if($this->request->is('get')){
			//echo $id.'  '. $us;
			//$this->Usuario->Conexion->save($this->request->data);
			$conexion = $this->Usuario->Conexion->save(array(
				"aceptado" => 0,
				"usuarios_id" => $id,
				"usuarios_id1" => $us,
			));

				if($conexion){
					$this->Session->setFlash('La conexion se ha guardado');
				} else {
					throw new Exception('No se pudo guardar la conexion');
				}
		

		} else {

			echo "access Deny";
		}
		// Logic for finalizing order goes here
	  
	     $this->redirect(array('controller' => 'Usuarios', 'action' => 'index'));


}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->Usuario->Empresa->find('list');
		$ciudades = $this->Usuario->Ciudad->find('list');
		$industrias = $this->Usuario->Industria->find('list');
		//$skilles = $this->Usuario->UsuariosSkill->find('list');
		$this->set(compact('empresas', 'ciudades', 'industrias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}
	$empresas = $this->Usuario->Empresa->find('list');
		$ciudades = $this->Usuario->Ciudad->find('list');
		$industrias = $this->Usuario->Industria->find('list');
		//$skilles = $this->Usuario->UsuariosSkill->find('list');
		$this->set(compact('empresas', 'ciudades', 'industrias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('The usuario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usuario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}



	public function dashboard(){

		$usr = $this->Usuario->find('all');
		$this->set(compact('usr'));

	}

	public function beforeFilter() {
	    if($this->action == 'login' || $this->action == 'add'){
	    	return true;
	    }else{
	    	parent::beforeFilter();
	    }
	}

	public function login() {
		 $this->layout = 'login';
		if ($this->request->is('post')) {
	    	// Debugger::dump($this->Auth->login()); 
	    	//debug($this->Auth->login()); die();  //Login
          		
      		$data=$this->request->data; // agregamos variable general del request.
            
            $email = $data['Usuarios']['email'];  // $this->request->data['Usuarios']['email'];
            $password = md5($data['Usuarios']['password']);	
            //print_r($data);die();
           
            // $this->Usuario->recursive = -1;
            $usuario = $this->Usuario->find('first', 
            		array( 'conditions'=> 	
            			array(  'Usuario.email'=> $email, 
            					'Usuario.password'=>$password)));
          	if(!empty($usuario)){
          		$this->Session->write('Usuario', $usuario['Usuario']);
          		
          		$this->redirect('/');
          	}else{
          		$this->Session->setFlash('Usuario y/o contraseña incorrectos');
          	}
         }
	}


	public function logout() {
		$this->Session->delete('Usuario');
	    $this->redirect('/');
	}


/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
		$this->set('usuario', $this->Usuario->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->Usuario->Empresa->find('list');
		$ciudades = $this->Usuario->Ciudad->find('list');
		$industrias = $this->Usuario->Industria->find('list');
		$skilles = $this->Usuario->Skill->find('list');
		$this->set(compact('empresas', 'ciudades', 'industrias', 'skilles'));
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->Usuario->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Usuario.' . $this->Usuario->primaryKey => $id));
			$this->request->data = $this->Usuario->find('first', $options);
		}
		$empresas = $this->Usuario->Empresa->find('list');
		$ciudades = $this->Usuario->Ciudad->find('list');
		$industrias = $this->Usuario->Industria->find('list');
		$skilles = $this->Usuario->Skill->find('list');
		$this->set(compact('empresas', 'ciudades', 'industrias', 'skilles'));
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('The usuario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usuario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


}
