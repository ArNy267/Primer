<?php
App::uses('AppController', 'Controller');
/**
 * Solicitudes Controller
 *
 * @property Solicitud $Solicitud
 * @property PaginatorComponent $Paginator
 */
class SolicitudesController extends AppController {

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
		$this->Solicitud->recursive = 0;
		$this->set('solicitudes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Solicitud->exists($id)) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		$options = array('conditions' => array('Solicitud.' . $this->Solicitud->primaryKey => $id));
		$this->set('solicitud', $this->Solicitud->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Solicitud->create();
			if ($this->Solicitud->save($this->request->data)) {
				$this->Session->setFlash(__('The solicitud has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solicitud could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Solicitud->Usuario->find('list');
		$monedas = $this->Solicitud->Moneda->find('list', array(
				'fields' => 'Moneda.nombre',
			));
                
		$industrias = $this->Solicitud->Industria->find('list');
		$this->set(compact('usuarios', 'monedas', 'industrias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $otro = null, $parent = null) {
                echo $parent;
		if (!$this->Solicitud->exists($id)) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Solicitud->save($this->request->data)) {
				$this->Session->setFlash(__('The solicitud has been saved.'));
				return $this->redirect(array('action' => 'Usuarios', 'view' => 'index'));
			} else {
				$this->Session->setFlash(__('The solicitud could not be saved. Please, try again.'));
			}
		} else {
			
                $options = array('conditions' => array('Solicitud.' . $this->Solicitud->primaryKey => $id));
                $requestData = $this->request->data;
                        
                        $SolicitudFindList = $this->Solicitud->find('all', array(
                                'fields' => array( 
                                    'Solicitud.Titulo',
                                    'Solicitud.Descripcion',
                                ),
                                'conditions' => array(
                                    'Solicitud.id' => $id,
                                )
                            
                        ));
                        
                        //debug2($requestData);
                        //debug2($SolicitudFindList);
			 $this->request->data = $this->Solicitud->find('first', $options);
		}
		$usuarios = $this->Solicitud->Usuario->find('list');
		$monedas = $this->Solicitud->Moneda->find('list', array(
                        'fields' => array(
                            'Moneda.nombre'
                        )
                ));
		$industrias = $this->Solicitud->Industria->find('list');
		$this->set(compact('usuarios', 'monedas', 'industrias', 'SolicitudFindList', 'id','parent'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Solicitud->id = $id;
		if (!$this->Solicitud->exists()) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Solicitud->delete()) {
			$this->Session->setFlash(__('The solicitud has been deleted.'));
		} else {
			$this->Session->setFlash(__('The solicitud could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Solicitud->recursive = 0;
		$this->set('solicitudes', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Solicitud->exists($id)) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		$options = array('conditions' => array('Solicitud.' . $this->Solicitud->primaryKey => $id));
		$this->set('solicitud', $this->Solicitud->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Solicitud->create();
			if ($this->Solicitud->save($this->request->data)) {
				$this->Session->setFlash(__('The solicitud has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solicitud could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Solicitud->Usuario->find('list');
		$monedas = $this->Solicitud->Moneda->find('list');
		$industrias = $this->Solicitud->Industria->find('list');
		$this->set(compact('usuarios', 'monedas', 'industrias'));
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->Solicitud->exists($id)) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Solicitud->save($this->request->data)) {
				$this->Session->setFlash(__('The solicitud has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The solicitud could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Solicitud.' . $this->Solicitud->primaryKey => $id));
			$this->request->data = $this->Solicitud->find('first', $options);
		}
		$usuarios = $this->Solicitud->Usuario->find('list');
		$monedas = $this->Solicitud->Moneda->find('list');
		$industrias = $this->Solicitud->Industria->find('list');
		$this->set(compact('usuarios', 'monedas', 'industrias'));
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->Solicitud->id = $id;
		if (!$this->Solicitud->exists()) {
			throw new NotFoundException(__('Invalid solicitud'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Solicitud->delete()) {
			$this->Session->setFlash(__('The solicitud has been deleted.'));
		} else {
			$this->Session->setFlash(__('The solicitud could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
