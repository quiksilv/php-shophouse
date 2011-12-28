<?php 
/* SVN FILE: $Id$ */
/* Product Fixture generated on: 2009-12-02 08:16:36 : 1259712996*/

class ProductFixture extends CakeTestFixture {
	var $name = 'Product';
	var $table = 'products';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'category_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'image_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'reference_number' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'description' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'price' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'category_id'  => 1,
		'image_id'  => 1,
		'reference_number'  => 'Lorem ipsum dolor sit amet',
		'name'  => 'Lorem ipsum dolor sit amet',
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'price'  => 'Lorem ip',
		'created'  => '2009-12-02 08:16:36',
		'modified'  => '2009-12-02 08:16:36'
	));
}
?>