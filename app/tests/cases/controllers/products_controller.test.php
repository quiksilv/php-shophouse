<?php 
/* SVN FILE: $Id$ */
/* ProductsController Test cases generated on: 2009-12-02 08:17:00 : 1259713020*/
App::import('Controller', 'Products');

class TestProducts extends ProductsController {
	var $autoRender = false;
}

class ProductsControllerTest extends CakeTestCase {
	var $Products = null;

	function startTest() {
		$this->Products = new TestProducts();
		$this->Products->constructClasses();
	}

	function testProductsControllerInstance() {
		$this->assertTrue(is_a($this->Products, 'ProductsController'));
	}

	function endTest() {
		unset($this->Products);
	}
}
?>