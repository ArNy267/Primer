<?php
App::uses('AppController', 'Controller');
/**
 * Conexiones Controller
 *
 * @property Conexion $Conexion
 * @property PaginatorComponent $Paginator
 */
class ConexionesController extends AppController {

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
		$this->Conexion->recursive = 0;
		$this->set('conexiones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Conexion->exists($id)) {
			throw new NotFoundException(__('Invalid conexion'));
		}
		$options = array('conditions' => array('Conexion.' . $this->Conexion->primaryKey => $id));
		$this->set('conexion', $this->Conexion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conexion->create();
			if ($this->Conexion->save($this->request->data)) {
				$this->Session->setFlash(__('The conexion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conexion could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Conexion->Usuarios->find('list');
		$usuarios1s = $this->Conexion->Usuarios1->find('list');
		$this->set(compact('usuarios', 'usuarios1s'));
	}

/**
 * aceptar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function aceptar($id = null){

		if (!$this->Conexion->exists($id)) {
					throw new NotFoundException(__('Invalid conexion'));
				}
			
		if($this->request->is('get')){

			$this->Conexion->id = $id;
			if($this->Conexion->saveField('aceptado', 1)){

				$this->Session->setFlash(__('Has aceptado la solicitud de conexion'));
				return $this->redirect(array('Controller' => 'Usuarios', 'action' => 'index'));
			};

				/*$this->Get->save();

			if ($this->Conexion->save()) {
				$this->Session->setFlash(__('The conexion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conexion could not be saved. Please, try again.'));
			}*/

		}
	}	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function edit($id = null) {
		

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conexion->save($this->request->data)) {
				$this->Session->setFlash(__('The conexion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conexion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conexion.' . $this->Conexion->primaryKey => $id));
			$this->request->data = $this->Conexion->find('first', $options);
		}
		$usuarios = $this->Conexion->Usuarios->find('list');
		$usuarios1s = $this->Conexion->Usuarios1->find('list');
		$this->set(compact('usuarios', 'usuarios1s'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Conexion->id = $id;
		if (!$this->Conexion->exists()) {
			throw new NotFoundException(__('Invalid conexion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Conexion->delete()) {
			$this->Session->setFlash(__('The conexion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The conexion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Conexion->recursive = 0;
		$this->set('conexiones', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Conexion->exists($id)) {
			throw new NotFoundException(__('Invalid conexion'));
		}
		$options = array('conditions' => array('Conexion.' . $this->Conexion->primaryKey => $id));
		$this->set('conexion', $this->Conexion->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Conexion->create();
			if ($this->Conexion->save($this->request->data)) {
				$this->Session->setFlash(__('The conexion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conexion could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Conexion->Usuario->find('list');
		$usuarios1s = $this->Conexion->Usuarios1->find('list');
		$this->set(compact('usuarios', 'usuarios1s'));
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->Conexion->exists($id)) {
			throw new NotFoundException(__('Invalid conexion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conexion->save($this->request->data)) {
				$this->Session->setFlash(__('The conexion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conexion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conexion.' . $this->Conexion->primaryKey => $id));
			$this->request->data = $this->Conexion->find('first', $options);
		}
		$usuarios = $this->Conexion->Usuario->find('list');
		$usuarios1s = $this->Conexion->Usuarios1->find('list');
		$this->set(compact('usuarios', 'usuarios1s'));
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->Conexion->id = $id;
		if (!$this->Conexion->exists()) {
			throw new NotFoundException(__('Invalid conexion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Conexion->delete()) {
			$this->Session->setFlash(__('The conexion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The conexion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
