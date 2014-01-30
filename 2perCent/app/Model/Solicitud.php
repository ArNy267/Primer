<?php
App::uses('AppModel', 'Model');
/**
 * Solicitud Model
 *
 * @property Usuario $Usuario
 * @property Moneda $Moneda
 * @property Industria $Industria
 * @property Negociacion $Negociacion
 */
class Solicitud extends AppModel {


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
		'Moneda' => array(
			'className' => 'Moneda',
			'foreignKey' => 'moneda_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Industria' => array(
			'className' => 'Industria',
			'foreignKey' => 'industria_id',
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
		'Negociacion' => array(
			'className' => 'Negociacion',
			'foreignKey' => 'solicitud_id',
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
