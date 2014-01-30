<?php
App::uses('AppController', 'Controller');
/**
 * Conectados Controller
 *
 * @property Conectado $Conectado
 * @property PaginatorComponent $Paginator
 */
class ConectadosController extends AppController {

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
		$this->Conectado->recursive = 0;
		$this->set('conectados', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Conectado->exists($id)) {
			throw new NotFoundException(__('Invalid conectado'));
		}
		$options = array('conditions' => array('Conectado.' . $this->Conectado->primaryKey => $id));
		$this->set('conectado', $this->Conectado->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conectado->create();
			if ($this->Conectado->save($this->request->data)) {
				$this->Session->setFlash(__('The conectado has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conectado could not be saved. Please, try again.'));
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
		if (!$this->Conectado->exists($id)) {
			throw new NotFoundException(__('Invalid conectado'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conectado->save($this->request->data)) {
				$this->Session->setFlash(__('The conectado has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conectado could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conectado.' . $this->Conectado->primaryKey => $id));
			$this->request->data = $this->Conectado->find('first', $options);
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
		$this->Conectado->id = $id;
		if (!$this->Conectado->exists()) {
			throw new NotFoundException(__('Invalid conectado'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Conectado->delete()) {
			$this->Session->setFlash(__('The conectado has been deleted.'));
		} else {
			$this->Session->setFlash(__('The conectado could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Conectado->recursive = 0;
		$this->set('conectados', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Conectado->exists($id)) {
			throw new NotFoundException(__('Invalid conectado'));
		}
		$options = array('conditions' => array('Conectado.' . $this->Conectado->primaryKey => $id));
		$this->set('conectado', $this->Conectado->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Conectado->create();
			if ($this->Conectado->save($this->request->data)) {
				$this->Session->setFlash(__('The conectado has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conectado could not be saved. Please, try again.'));
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
		if (!$this->Conectado->exists($id)) {
			throw new NotFoundException(__('Invalid conectado'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conectado->save($this->request->data)) {
				$this->Session->setFlash(__('The conectado has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conectado could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conectado.' . $this->Conectado->primaryKey => $id));
			$this->request->data = $this->Conectado->find('first', $options);
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
		$this->Conectado->id = $id;
		if (!$this->Conectado->exists()) {
			throw new NotFoundException(__('Invalid conectado'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Conectado->delete()) {
			$this->Session->setFlash(__('The conectado has been deleted.'));
		} else {
			$this->Session->setFlash(__('The conectado could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
