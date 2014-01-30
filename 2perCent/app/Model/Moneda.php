<?php
App::uses('AppModel', 'Model');
/**
 * Moneda Model
 *
 * @property Solicitude $Solicitude
 */
class Moneda extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Solicitude' => array(
			'className' => 'Solicitude',
			'foreignKey' => 'moneda_id',
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
