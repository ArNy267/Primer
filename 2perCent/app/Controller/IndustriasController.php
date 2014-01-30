<?php
App::uses('AppController', 'Controller');
/**
 * Industrias Controller
 *
 * @property Industria $Industria
 * @property PaginatorComponent $Paginator
 */
class IndustriasController extends AppController {

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
		$this->Industria->recursive = 0;
		$this->set('industrias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Industria->exists($id)) {
			throw new NotFoundException(__('Invalid industria'));
		}
		$options = array('conditions' => array('Industria.' . $this->Industria->primaryKey => $id));
		$this->set('industria', $this->Industria->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Industria->create();
			if ($this->Industria->save($this->request->data)) {
				$this->Session->setFlash(__('The industria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The industria could not be saved. Please, try again.'));
			}
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
		if (!$this->Industria->exists($id)) {
			throw new NotFoundException(__('Invalid industria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Industria->save($this->request->data)) {
				$this->Session->setFlash(__('The industria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The industria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Industria.' . $this->Industria->primaryKey => $id));
			$this->request->data = $this->Industria->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Industria->id = $id;
		if (!$this->Industria->exists()) {
			throw new NotFoundException(__('Invalid industria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Industria->delete()) {
			$this->Session->setFlash(__('The industria has been deleted.'));
		} else {
			$this->Session->setFlash(__('The industria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Industria->recursive = 0;
		$this->set('industrias', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Industria->exists($id)) {
			throw new NotFoundException(__('Invalid industria'));
		}
		$options = array('conditions' => array('Industria.' . $this->Industria->primaryKey => $id));
		$this->set('industria', $this->Industria->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Industria->create();
			if ($this->Industria->save($this->request->data)) {
				$this->Session->setFlash(__('The industria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The industria could not be saved. Please, try again.'));
			}
		}
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->Industria->exists($id)) {
			throw new NotFoundException(__('Invalid industria'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Industria->save($this->request->data)) {
				$this->Session->setFlash(__('The industria has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The industria could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Industria.' . $this->Industria->primaryKey => $id));
			$this->request->data = $this->Industria->find('first', $options);
		}
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->Industria->id = $id;
		if (!$this->Industria->exists()) {
			throw new NotFoundException(__('Invalid industria'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Industria->delete()) {
			$this->Session->setFlash(__('The industria has been deleted.'));
		} else {
			$this->Session->setFlash(__('The industria could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
