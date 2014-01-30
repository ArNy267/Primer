<?php
App::uses('AppModel', 'Model');
/**
 * Negociacion Model
 *
 * @property Negociacion $ParentNegociacion
 * @property Solicitud $Solicitud
 * @property Usuario $Usuario
 * @property Usuario2 $Usuario2
 * @property Negociacion $ChildNegociacion
 */
class Negociacion extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentNegociacion' => array(
			'className' => 'Negociacion',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Solicitud' => array(
			'className' => 'Solicitud',
			'foreignKey' => 'solicitud_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario2' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id2',
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
		'ChildNegociacion' => array(
			'className' => 'Negociacion',
			'foreignKey' => 'parent_id',
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
