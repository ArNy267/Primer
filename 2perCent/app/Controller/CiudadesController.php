<?php
App::uses('AppController', 'Controller');
/**
 * Ciudades Controller
 *
 * @property Ciudad $Ciudad
 * @property PaginatorComponent $Paginator
 */
class CiudadesController extends AppController {

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
		$this->Ciudad->recursive = 0;
		$this->set('ciudades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ciudad->exists($id)) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		$options = array('conditions' => array('Ciudad.' . $this->Ciudad->primaryKey => $id));
		$this->set('ciudad', $this->Ciudad->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ciudad->create();
			if ($this->Ciudad->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudad has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudad could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Ciudad->Estado->find('list');
		$this->set(compact('estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ciudad->exists($id)) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ciudad->save($this->request->data)) {

				$this->Session->setFlash(__('The ciudad has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudad could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ciudad.' . $this->Ciudad->primaryKey => $id));
			$this->request->data = $this->Ciudad->find('first', $options);
		}

		$estados = $this->Ciudad->Estado->find('list');
		$this->set(compact('estados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ciudad->id = $id;
		if (!$this->Ciudad->exists()) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ciudad->delete()) {
			$this->Session->setFlash(__('The ciudad has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ciudad could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Ciudad->recursive = 0;
		$this->set('ciudades', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Ciudad->exists($id)) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		$options = array('conditions' => array('Ciudad.' . $this->Ciudad->primaryKey => $id));
		$this->set('ciudad', $this->Ciudad->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Ciudad->create();
			if ($this->Ciudad->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudad has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudad could not be saved. Please, try again.'));
			}
		}
		$estados = $this->Ciudad->Estado->find('list');
		$this->set(compact('estados'));
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->Ciudad->exists($id)) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ciudad->save($this->request->data)) {
				$this->Session->setFlash(__('The ciudad has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciudad could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ciudad.' . $this->Ciudad->primaryKey => $id));
			$this->request->data = $this->Ciudad->find('first', $options);
		}
		$estados = $this->Ciudad->Estado->find('list');
		$this->set(compact('estados'));
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->Ciudad->id = $id;
		if (!$this->Ciudad->exists()) {
			throw new NotFoundException(__('Invalid ciudad'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ciudad->delete()) {
			$this->Session->setFlash(__('The ciudad has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ciudad could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
