<?php 
/* SVN FILE: $Id$ */
/* Category Fixture generated on: 2009-12-02 08:15:59 : 1259712959*/

class CategoryFixture extends CakeTestFixture {
	var $name = 'Category';
	var $table = 'categories';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2009-12-02 08:15:59',
		'modified'  => '2009-12-02 08:15:59'
	));
}
?>