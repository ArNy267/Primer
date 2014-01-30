<?php
App::uses('AppModel', 'Model');
/**
 * Mensaj Model
 *
 * @property Mensaj $ParentMensaj
 * @property Mensaj $ChildMensaj
 */
class Mensaj extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titulo';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentMensaj' => array(
			'className' => 'Mensaj',
			'foreignKey' => 'parent_id',
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
		'ChildMensaj' => array(
			'className' => 'Mensaj',
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
