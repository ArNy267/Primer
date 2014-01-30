<?php
App::uses('AppController', 'Controller');
/**
 * Monedas Controller
 *
 * @property Moneda $Moneda
 * @property PaginatorComponent $Paginator
 */
class MonedasController extends AppController {

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
		$this->Moneda->recursive = 0;
		$this->set('monedas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Moneda->exists($id)) {
			throw new NotFoundException(__('Invalid moneda'));
		}
		$options = array('conditions' => array('Moneda.' . $this->Moneda->primaryKey => $id));
		$this->set('moneda', $this->Moneda->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Moneda->create();
			if ($this->Moneda->save($this->request->data)) {
				$this->Session->setFlash(__('The moneda has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The moneda could not be saved. Please, try again.'));
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
		if (!$this->Moneda->exists($id)) {
			throw new NotFoundException(__('Invalid moneda'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Moneda->save($this->request->data)) {
				$this->Session->setFlash(__('The moneda has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The moneda could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Moneda.' . $this->Moneda->primaryKey => $id));
			$this->request->data = $this->Moneda->find('first', $options);
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
		$this->Moneda->id = $id;
		if (!$this->Moneda->exists()) {
			throw new NotFoundException(__('Invalid moneda'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Moneda->delete()) {
			$this->Session->setFlash(__('The moneda has been deleted.'));
		} else {
			$this->Session->setFlash(__('The moneda could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
