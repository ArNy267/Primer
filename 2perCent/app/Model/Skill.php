<?php
App::uses('AppModel', 'Model');
/**
 * Skill Model
 *
 * @property Usuario $Usuario
 */
class Skill extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'skills';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'UsuariosSkill' => array(
			'className' => 'UsuariosSkill',
			'foreignKey' => 'skill_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
