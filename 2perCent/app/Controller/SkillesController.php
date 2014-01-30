<?php
App::uses('AppController', 'Controller');
/**
 * Skilles Controller
 *
 * @property Skill $Skill
 * @property PaginatorComponent $Paginator
 */
class SkillesController extends AppController {

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
		$this->Skill->recursive = 0;
		$this->set('skilles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		

		if (!$this->Skill->exists($id)) {
			throw new NotFoundException(__('Invalid skill'));
		}
		$options = array('conditions' => array('Skill.' . $this->Skill->primaryKey => $id));
		$this->set('skill', $this->Skill->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if($this->request->is('post')) {
			
			$this->Skill->create();
			if ($this->Skill->save($this->request->data)) {
				
				$this->skill->UsuariosSkill->save(array(
					'skill_id' => $this->Skill->getLastInsertID(),
					'usuario_id' => $usuario_logged_id));

				$this->Session->setFlash(__('The skill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The skill could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Skill->find('list');
		
		$this->set(compact('usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Skill->exists($id)) {
			throw new NotFoundException(__('Invalid skill'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Skill->save($this->request->data)) {
				$this->Session->setFlash(__('The skill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The skill could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Skill.' . $this->Skill->primaryKey => $id));
			$this->request->data = $this->Skill->find('first', $options);
		}
		$usuarios = $this->Skill->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Skill->id = $id;
		if (!$this->Skill->exists()) {
			throw new NotFoundException(__('Invalid skill'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Skill->delete()) {
			$this->Session->setFlash(__('The skill has been deleted.'));
		} else {
			$this->Session->setFlash(__('The skill could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * n_index method
 *
 * @return void
 */
	public function n_index() {
		$this->Skill->recursive = 0;
		$this->set('skilles', $this->Paginator->paginate());
	}

/**
 * n_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_view($id = null) {
		if (!$this->Skill->exists($id)) {
			throw new NotFoundException(__('Invalid skill'));
		}
		$options = array('conditions' => array('Skill.' . $this->Skill->primaryKey => $id));
		$this->set('skill', $this->Skill->find('first', $options));
	}

/**
 * n_add method
 *
 * @return void
 */
	public function n_add() {
		if ($this->request->is('post')) {
			$this->Skill->create();
			if ($this->Skill->save($this->request->data)) {
				$this->Session->setFlash(__('The skill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The skill could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Skill->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * n_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_edit($id = null) {
		if (!$this->Skill->exists($id)) {
			throw new NotFoundException(__('Invalid skill'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Skill->save($this->request->data)) {
				$this->Session->setFlash(__('The skill has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The skill could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Skill.' . $this->Skill->primaryKey => $id));
			$this->request->data = $this->Skill->find('first', $options);
		}
		$usuarios = $this->Skill->Usuario->find('list');
		$this->set(compact('usuarios'));
	}

/**
 * n_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function n_delete($id = null) {
		$this->Skill->id = $id;
		if (!$this->Skill->exists()) {
			throw new NotFoundException(__('Invalid skill'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Skill->delete()) {
			$this->Session->setFlash(__('The skill has been deleted.'));
		} else {
			$this->Session->setFlash(__('The skill could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
