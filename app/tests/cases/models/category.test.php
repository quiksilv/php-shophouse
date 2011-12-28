<?php 
/* SVN FILE: $Id$ */
/* Category Test cases generated on: 2009-12-02 08:15:59 : 1259712959*/
App::import('Model', 'Category');

class CategoryTestCase extends CakeTestCase {
	var $Category = null;
	var $fixtures = array('app.category', 'app.product');

	function startTest() {
		$this->Category =& ClassRegistry::init('Category');
	}

	function testCategoryInstance() {
		$this->assertTrue(is_a($this->Category, 'Category'));
	}

	function testCategoryFind() {
		$this->Category->recursive = -1;
		$results = $this->Category->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Category' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-12-02 08:15:59',
			'modified'  => '2009-12-02 08:15:59'
		));
		$this->assertEqual($results, $expected);
	}
}
?>