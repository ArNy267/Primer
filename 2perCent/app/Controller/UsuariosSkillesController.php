<?php
App::uses('AppController', 'Controller');
/**
 * UsuariosSkilles Controller
 *
 * @property UsuariosSkill $UsuariosSkill
 * @property PaginatorComponent $Paginator
 */
class UsuariosSkillesController extends AppController {

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
		$this->UsuariosSkill->recursive = 0;
		$this->set('usuariosSkilles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UsuariosSkill->exists($id)) {
			throw new NotFoundException(__('Invalid usuarios skill'));
		}
		$options = array('conditions' => array('UsuariosSkill.' . $this->UsuariosSkill->primaryKey => $id));
		$this->set('usuariosSkill', $this->UsuariosSkill->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsuariosSkill->create();
			if ($this->UsuariosSkill->save($this->request->data)) {
				$this->Session->setFlash(__('The usuarios skill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuarios skill could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->UsuariosSkill->Usuario->find('list');
		$skilles = $this->UsuariosSkill->Skill->find('list');
		$this->set(compact('usuarios', 'skilles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UsuariosSkill->exists($id)) {
			throw new NotFoundException(__('Invalid usuarios skill'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsuariosSkill->save($this->request->data)) {
				$this->Session->setFlash(__('The usuarios skill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuarios skill could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsuariosSkill.' . $this->UsuariosSkill->primaryKey => $id));
			$this->request->data = $this->UsuariosSkill->find('first', $options);
		}
		$usuarios = $this->UsuariosSkill->Usuario->find('list');
		$skilles = $this->UsuariosSkill->Skill->find('list');
		$this->set(compact('usuarios', 'skilles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UsuariosSkill->id = $id;
		if (!$this->UsuariosSkill->exists()) {
			throw new NotFoundException(__('Invalid usuarios skill'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UsuariosSkill->delete()) {
			$this->Session->setFlash(__('The usuarios skill has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usuarios skill could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->UsuariosSkill->recursive = 0;
		$this->set('usuariosSkilles', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->UsuariosSkill->exists($id)) {
			throw new NotFoundException(__('Invalid usuarios skill'));
		}
		$options = array('conditions' => array('UsuariosSkill.' . $this->UsuariosSkill->primaryKey => $id));
		$this->set('usuariosSkill', $this->UsuariosSkill->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->UsuariosSkill->create();
			if ($this->UsuariosSkill->save($this->request->data)) {
				$this->Session->setFlash(__('The usuarios skill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuarios skill could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->UsuariosSkill->Usuario->find('list');
		$skilles = $this->UsuariosSkill->Skill->find('list');
		$this->set(compact('usuarios', 'skilles'));
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->UsuariosSkill->exists($id)) {
			throw new NotFoundException(__('Invalid usuarios skill'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UsuariosSkill->save($this->request->data)) {
				$this->Session->setFlash(__('The usuarios skill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usuarios skill could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UsuariosSkill.' . $this->UsuariosSkill->primaryKey => $id));
			$this->request->data = $this->UsuariosSkill->find('first', $options);
		}
		$usuarios = $this->UsuariosSkill->Usuario->find('list');
		$skilles = $this->UsuariosSkill->Skill->find('list');
		$this->set(compact('usuarios', 'skilles'));
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->UsuariosSkill->id = $id;
		if (!$this->UsuariosSkill->exists()) {
			throw new NotFoundException(__('Invalid usuarios skill'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UsuariosSkill->delete()) {
			$this->Session->setFlash(__('The usuarios skill has been deleted.'));
		} else {
			$this->Session->setFlash(__('The usuarios skill could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
