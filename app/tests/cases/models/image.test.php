<?php 
/* SVN FILE: $Id$ */
/* Image Test cases generated on: 2009-12-02 08:16:11 : 1259712971*/
App::import('Model', 'Image');

class ImageTestCase extends CakeTestCase {
	var $Image = null;
	var $fixtures = array('app.image', 'app.product');

	function startTest() {
		$this->Image =& ClassRegistry::init('Image');
	}

	function testImageInstance() {
		$this->assertTrue(is_a($this->Image, 'Image'));
	}

	function testImageFind() {
		$this->Image->recursive = -1;
		$results = $this->Image->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Image' => array(
			'id'  => 1,
			'type'  => 'Lorem ipsum dolor sit amet',
			'size'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-12-02 08:16:11'
		));
		$this->assertEqual($results, $expected);
	}
}
?>