<?php
class Product extends AppModel {

	var $name = 'Product';
	var $actsAs = array('Tree', 'Tag' => array('table_label' => 'tags', 'tags_label' => 'tag', 'separator' => ',') );
	var $types = array('him' => 'him', 'her' => 'her', 'couple' => 'couple');
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'image_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasAndBelongsToMany = array(
		'Tag' =>
			array('className'    => 'Tag',
			     'joinTable'    => 'products_tags',
			     'foreignKey'   => 'product_id',
			     'associationForeignKey'=> 'tag_id',
			     'conditions'   => '',
			     'order'        => '',
			     'limit'        => '',
			     'unique'       => true,
			     'finderQuery'  => '',
			     'deleteQuery'  => '',
		       ) 
	);
	function beforeFind($queryData) {
		$current_route = Router::currentRoute();
		if(!array_key_exists('prefix', $current_route[3]) ) {
			$queryData['conditions']['published'] = 1;
			return $queryData;
		}
		if($current_route[3]['prefix'] != "admin") {
			$queryData['conditions']['published'] = 1;
			return $queryData;
		}
	}
}
?>
