<?php
class Image extends AppModel {

	var $name = 'Image';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasOne = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'image_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>