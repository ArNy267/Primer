<?php
App::uses('AppController', 'Controller');
/**
 * Mensajes Controller
 *
 * @property Mensaj $Mensaj
 * @property PaginatorComponent $Paginator
 */
class MensajesController extends AppController {

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
		$this->Mensaj->recursive = 0;
		$this->set('mensajes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mensaj->exists($id)) {
			throw new NotFoundException(__('Invalid mensaj'));
		}
		$options = array('conditions' => array('Mensaj.' . $this->Mensaj->primaryKey => $id));
		$this->set('mensaj', $this->Mensaj->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Mensaj->create();
			if ($this->Mensaj->save($this->request->data)) {
				$this->Session->setFlash(__('The mensaj has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mensaj could not be saved. Please, try again.'));
			}
		}
				

		$parentMensajes = $this->Mensaj->ParentMensaj->find('list');
		$this->set(compact('parentMensajes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Mensaj->exists($id)) {
			throw new NotFoundException(__('Invalid mensaj'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mensaj->save($this->request->data)) {
				$this->Session->setFlash(__('The mensaj has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mensaj could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mensaj.' . $this->Mensaj->primaryKey => $id));
			$this->request->data = $this->Mensaj->find('first', $options);
		}
		$parentMensajes = $this->Mensaj->ParentMensaj->find('list');
		$this->set(compact('parentMensajes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Mensaj->id = $id;
		if (!$this->Mensaj->exists()) {
			throw new NotFoundException(__('Invalid mensaj'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Mensaj->delete()) {
			$this->Session->setFlash(__('The mensaj has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mensaj could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Mensaj->recursive = 0;
		$this->set('mensajes', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Mensaj->exists($id)) {
			throw new NotFoundException(__('Invalid mensaj'));
		}
		$options = array('conditions' => array('Mensaj.' . $this->Mensaj->primaryKey => $id));
		$this->set('mensaj', $this->Mensaj->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Mensaj->create();
			if ($this->Mensaj->save($this->request->data)) {
				$this->Session->setFlash(__('The mensaj has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mensaj could not be saved. Please, try again.'));
			}
		}
		$parentMensajes = $this->Mensaj->ParentMensaj->find('list');
		$this->set(compact('parentMensajes'));
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->Mensaj->exists($id)) {
			throw new NotFoundException(__('Invalid mensaj'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mensaj->save($this->request->data)) {
				$this->Session->setFlash(__('The mensaj has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mensaj could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mensaj.' . $this->Mensaj->primaryKey => $id));
			$this->request->data = $this->Mensaj->find('first', $options);
		}
		$parentMensajes = $this->Mensaj->ParentMensaj->find('list');
		$this->set(compact('parentMensajes'));
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->Mensaj->id = $id;
		if (!$this->Mensaj->exists()) {
			throw new NotFoundException(__('Invalid mensaj'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Mensaj->delete()) {
			$this->Session->setFlash(__('The mensaj has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mensaj could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
