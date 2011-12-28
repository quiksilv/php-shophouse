<?php 
/* SVN FILE: $Id$ */
/* Product Test cases generated on: 2009-12-02 08:16:36 : 1259712996*/
App::import('Model', 'Product');

class ProductTestCase extends CakeTestCase {
	var $Product = null;
	var $fixtures = array('app.product', 'app.category', 'app.image');

	function startTest() {
		$this->Product =& ClassRegistry::init('Product');
	}

	function testProductInstance() {
		$this->assertTrue(is_a($this->Product, 'Product'));
	}

	function testProductFind() {
		$this->Product->recursive = -1;
		$results = $this->Product->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Product' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>