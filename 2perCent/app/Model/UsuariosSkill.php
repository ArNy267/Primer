<?php
App::uses('AppModel', 'Model');
/**
 * UsuariosSkill Model
 *
 * @property Usuario $Usuario
 * @property Skill $Skill
 */
class UsuariosSkill extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'usuarios_skills';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Skill' => array(
			'className' => 'Skill',
			'foreignKey' => 'skill_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
