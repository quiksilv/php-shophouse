<?php
class SitemapsController extends AppController {
	var $uses = array('Product');
	var $paginate = array(
		'limit' => 9
	);
        function beforeFilter() {
                $this->Auth->allow('index');
        }
	function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate('Product') );
	}
}
?>
