<?php
App::uses('AppModel', 'Model');
/**
 * Ciudad Model
 *
 * @property Estado $Estado
 * @property Usuario $Usuario
 */
class Ciudad extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'ciudad_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
