<?php 
/* SVN FILE: $Id$ */
/* Image Fixture generated on: 2009-12-02 08:16:11 : 1259712971*/

class ImageFixture extends CakeTestFixture {
	var $name = 'Image';
	var $table = 'images';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'size' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 80),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'type'  => 'Lorem ipsum dolor sit amet',
		'size'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2009-12-02 08:16:11'
	));
}
?>