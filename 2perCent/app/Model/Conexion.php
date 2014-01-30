<?php
App::uses('AppModel', 'Model');
/**
 * Conexion Model
 *
 * @property Usuarios $Usuarios
 * @property Usuarios1 $Usuarios1
 */
class Conexion extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuarios' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuarios_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuarios1' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuarios_id1',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
