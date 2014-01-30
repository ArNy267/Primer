<?php
App::uses('AppController', 'Controller');
/**
 * Negociaciones Controller
 *
 * @property Negociacion $Negociacion
 * @property PaginatorComponent $Paginator
 */
class NegociacionesController extends AppController {

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
	public function index() {
		$this->Negociacion->recursive = 0;
		$this->set('negociaciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Negociacion->exists($id)) {
			throw new NotFoundException(__('Invalid negociacion'));
		}
		$comunikt = $this->Negociacion->find('all');
		$Comunicacion = $this->Negociacion->find('all', array(

				'conditions' => array(
					'Negociacion.parent_id' => $id,
					
					)
			));
		//debug2($comunikt);
		$options = array('conditions' => array('Negociacion.' . $this->Negociacion->primaryKey => $id));
		$this->set('negociacion', $this->Negociacion->find('first', $options));
		$this->set(compact('Comunicacion'));

	}

/**
 * add method
 *
 * @return void
 */
	public function add($id= null, /* $solicitud = null,*/  $Buscar = null) {
		//echo $id.'  gato  '.$Buscar;
		$uid = $this->Session->read('Usuario.id');

		## Si queremos guardar la informacion */
                
		if ($this->request->is('post')){ 
                    
                       if($this->request->data['Solicitud']['id'] != 0){
                    
                            if(!empty($this->request->data)){
                                // Use the following to avoid validation errors:
                                unset($this->Negociacion->Solicitud->validate['solicitud_id']);
                              if($this->Negociacion->saveAssociated($this->request->data)){
                                 $this->Session->setFlash(__('The negociacion has been saved.'));
                                    return $this->redirect(array('action' => 'Usuarios', 'view' => 'index'));
                                } else {
                                    $this->Session->setFlash(__('The negociacion could not be saved. Please, try again.'));
                                }
                            }
                        
                       

                        } else {
                            
                           $SolicitudExiste = $this->Negociacion->find('all', array(
                                'conditions' => $this->request->data['Solicitud']['id']
                            ));
                                
                           if(empty($SolicitudExiste)){
                            $this->Negociacion->create();
                              if ($this->Negociacion->save($this->request->data)) {
                                      $this->Session->setFlash(__('The negociacion has been saved.'));
                                     return $this->redirect(array('action' => 'Usuarios', 'view' => 'index'));
                              } else {
                                      $this->Session->setFlash(__('The negociacion could not be saved. Please, try again.'));
                              }

                           }


                        }
  //			$this->Negociacion->create();
//			if ($this->Negociacion->save($this->request->data)) {
//				$this->Session->setFlash(__('The negociacion has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Session->setFlash(__('The negociacion could not be saved. Please, try again.'));
//			}
		}

                
		$Negocios = $this->Negociacion->find('all', array(
				'fields' => array(
						'Negociacion.usuario_id',
                                                'Negociacion.solicitud_id',
						'Negociacion.usuario_id2',
						'Negociacion.parent_id',
						'Negociacion.mensaje',
						'Usuario.nombre',
						'Usuario.apellido',
						'Usuario2.nombre',
						'Usuario2.apellido',
						'Solicitud.id',
                                                'Solicitud.titulo'
					),
				'conditions' => array( 
						
                                            'AND' => array(
                                                    'Negociacion.usuario_id' => $uid,
                                                    //'Negociacion.usuario_id2' => $id,
                                                    'Negociacion.parent_id' => 0,
                                                    'Solicitud.titulo LIKE' => '%'.$Buscar.'%',
                                            )
						)
			
			));
               // debug2($Negocios);
                
                
                
                if($Negocios != null){
                    
                    ##Aqui cargamos los datos existentes.
                    
                    $options = array('conditions' => array('Solicitud.' . $this->Negociacion->Solicitud->primaryKey => $Negocios[0]['Negociacion']['solicitud_id']));
                    $this->request->data = $this->Negociacion->Solicitud->find('first', $options);
                    
                    $SolicitudFindList = $this->Negociacion->Solicitud->find('all', array(
                                'fields' => array( 
                                    'Solicitud.Titulo',
                                    'Solicitud.Descripcion',
                                ),
                                'Conditions' => array(
                                    'Solicitud.id' => $Negocios[0]['Negociacion']['solicitud_id'],
                                )
                            
                        ));
                }
                debug2($SolicitudFindList);
                $idNegocios = array();
                foreach($Negocios as $item){
                    
                    $idNegocios[] = $item['Solicitud']['id'];
                    
                }
                
                $ClavesNeg = implode(", ", $idNegocios);  	
                
               // debug($ClavesNeg);
                
                $solicitudes = $this->Negociacion->Solicitud->find('all', array(
                        'conditions' => array(
                                            'AND' => array( 
                                                    'Solicitud.titulo LIKE' => '%'.$Buscar.'%',
                                                    //'Negociacion.parent_id ' => 0
                                            )
                            ),
                        //'fields' => 'Solicitud.titulo',
                ));
                
		//debug2($solicitudes);

		if ($solicitudes != null) {
			$primer =array();
 		/*
			foreach ($solicitudes as $ItemSol ) {
				$primer[] = $ItemSol['Solicitud']['titulo'];
				//$segund[] = $ItemSol['Solicitud']['titulo'];
			}

		if(in_array($solicitud, $primer)) 
			{ $this->set('Amistad', true); } else { $this->set('Amistad',''); }
		
		

                } else {  echo 'No existe ninguna solicictud';  } */ }
                
		
		$parentNegociaciones = $this->Negociacion->ParentNegociacion->find('list');
		$usuarios = $this->Negociacion->Usuario->find('list');
		$usuario2s = $this->Negociacion->Usuario2->find('list');
                $monedas = $this->Negociacion->Solicitud->Moneda->find('list', array(
                        'fields' => array(
                            'Moneda.nombre'
                        )
                ));
		$industrias = $this->Negociacion->Solicitud->Industria->find('list');
		$this->set(compact('solicitudes', 'Negocios', 'parentNegociaciones',  'usuarios', 
                        'usuario2s', 'primer', 'id', 'SolicitudFindList', 'monedas',
                        'industrias', '$idNegocios'));
	}

/**
 * responder method
 *
 * @return void
 */
	public function responder($id= null, $solicitud = null) {
		//echo $id.'  gato  '.$solicitud;

		if ($this->request->is('post')) {
			$this->Negociacion->create();
			if ($this->Negociacion->save($this->request->data)) {
				$this->Session->setFlash(__('The negociacion has been saved.'));
				return $this->redirect(array('Controller' => 'usuarios', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The negociacion could not be saved. Please, try again.'));
			}
		}

		$parentNegociaciones = $this->Negociacion->ParentNegociacion->find('list');
		$solicitudes = $this->Negociacion->Solicitud->find('list', array(
							   'fields' => array('Solicitud.titulo')
							));

		if ($solicitudes != null) {
			$primer =array();
 /*
			foreach ($solicitudes as $ItemSol ) {
				$primer[] = $ItemSol['Solicitud']['titulo'];
				//$segund[] = $ItemSol['Solicitud']['titulo'];
			}*/

		if(in_array($solicitud, $primer)) { $this->set('Amistad', true); } else { $this->set('Amistad',''); }
		
		//debug2($solicitudes);

		} else {  echo 'No existe ninguna solicictud';  }

		

		$usuarios = $this->Negociacion->Usuario->find('list');
		$usuario2s = $this->Negociacion->Usuario2->find('list');
		$this->set(compact('parentNegociaciones', 'solicitudes', 'usuarios', 'usuario2s', 'primer', 'id', 'solicitud'));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Negociacion->exists($id)) {
			throw new NotFoundException(__('Invalid negociacion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Negociacion->save($this->request->data)) {
				$this->Session->setFlash(__('The negociacion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The negociacion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Negociacion.' . $this->Negociacion->primaryKey => $id));
			$this->request->data = $this->Negociacion->find('first', $options);
		}
		$parentNegociaciones = $this->Negociacion->ParentNegociacion->find('list');
		$solicitudes = $this->Negociacion->Solicitud->find('list');
		$usuarios = $this->Negociacion->Usuario->find('list');
		$usuario2s = $this->Negociacion->Usuario2->find('list');
		$this->set(compact('parentNegociaciones', 'solicitudes', 'usuarios', 'usuario2s'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Negociacion->id = $id;
		if (!$this->Negociacion->exists()) {
			throw new NotFoundException(__('Invalid negociacion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Negociacion->delete()) {
			$this->Session->setFlash(__('The negociacion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The negociacion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Negociacion->recursive = 0;
		$this->set('negociaciones', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Negociacion->exists($id)) {
			throw new NotFoundException(__('Invalid negociacion'));
		}
		$options = array('conditions' => array('Negociacion.' . $this->Negociacion->primaryKey => $id));
		$this->set('negociacion', $this->Negociacion->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Negociacion->create();
			if ($this->Negociacion->save($this->request->data)) {
				$this->Session->setFlash(__('The negociacion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The negociacion could not be saved. Please, try again.'));
			}
		}
		$parentNegociaciones = $this->Negociacion->ParentNegociacion->find('list');
		$solicitudes = $this->Negociacion->Solicitud->find('list');
		$usuarios = $this->Negociacion->Usuario->find('list');
		$usuario2s = $this->Negociacion->Usuario2->find('list');
		$this->set(compact('parentNegociaciones', 'solicitudes', 'usuarios', 'usuario2s'));
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->Negociacion->exists($id)) {
			throw new NotFoundException(__('Invalid negociacion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Negociacion->save($this->request->data)) {
				$this->Session->setFlash(__('The negociacion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The negociacion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Negociacion.' . $this->Negociacion->primaryKey => $id));
			$this->request->data = $this->Negociacion->find('first', $options);
		}
		$parentNegociaciones = $this->Negociacion->ParentNegociacion->find('list');
		$solicitudes = $this->Negociacion->Solicitud->find('list');
		$usuarios = $this->Negociacion->Usuario->find('list');
		$usuario2s = $this->Negociacion->Usuario2->find('list');
		$this->set(compact('parentNegociaciones', 'solicitudes', 'usuarios', 'usuario2s'));
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->Negociacion->id = $id;
		if (!$this->Negociacion->exists()) {
			throw new NotFoundException(__('Invalid negociacion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Negociacion->delete()) {
			$this->Session->setFlash(__('The negociacion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The negociacion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
