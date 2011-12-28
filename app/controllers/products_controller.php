<?php
class ProductsController extends AppController {

	var $name = 'Products';
	var $uses = array('Product', 'Tag');
	var $paginate = array(
		'limit' => 9 
	);
	function beforeFilter() {
		$this->Auth->allow('sidenav', 'search', 'index', 'view', 'featured', 'promotion');
	}    
        function promotion() {
                $this->layout = 'ajax';
                $this->Product->recursive = 0;
                $product = $this->Product->find('first', array(
                        'amount' => 1,
			'order' => 'modified DESC'
                ) );
		/**
			nothing in the database to display as random promotion product
		**/
		if(empty($product) ) {
			$product['Product'] = array(
				'name' => 'none', 
				'price' => '0', 
				'description' => ''
			);
			$product['Image'] = array('name' => '');
		}
                $this->set('product', $product);
        }
        function featured() {
                $this->layout = 'ajax';
                $this->Product->recursive = 0;
		$this->paginate = array(
			'conditions' => array(
				'featured' => true
			)
		);
                $this->set('products', $this->paginate('Product') );
        }
	function search() {
		if(empty($this->data['Product']['searchkey']) ) {
			return 0;
		}
                $this->Product->recursive = 1;
                $conditions = array(
                        //return base on parent product name
			'or' => array(
	                        'Product.name LIKE' => '%' . $this->data['Product']['searchkey'] . '%',
	                        'Product.description LIKE' => '%' . $this->data['Product']['searchkey'] . '%',
				'Product.tags LIKE' => '%' . $this->data['Product']['searchkey'] . '%'
			)
                );
                $this->paginate = array(
                        'conditions' => $conditions
                );
                $products = $this->paginate('Product');
                foreach($products as &$product) {
                        $product['Product']['totalchildren'] = $this->Product->childcount($product['Product']['id'], true);
                }
                $this->set('products', $products );
	}
	function index($type = 'him') {
		$this->Product->recursive = 0;
		$conditions = array(
			//return base on parent product name
			'Product.type' => $type,
			'not' => array('Product.parent_id' => null)
		);
		$this->paginate = array(
			'conditions' => $conditions,
			'limit' => 4
		);
		$products = $this->paginate('Product');
		$this->set('products', $products );
	}
	function view($reference_number = null) {
		if (!$reference_number) {
			$this->Session->setFlash(__('Invalid Product.', true));
			$this->redirect(array('action'=>'index'));
		}
		$product = $this->Product->findByReferenceNumber($reference_number);

		$this->Product->id = $product['Product']['id'];
		$neighbors = $this->Product->find('neighbors');
		$this->set('product', $product);
		$this->set('neighbors', $neighbors);
		#hack
		$this->Session->write('Product.name', $product['Product']['name']);
		$this->Session->write('Product.reference_number', $reference_number);
		$this->Session->write('Product.type', $product['Product']['type']);
		#hack
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The Product has been saved', true));
				
				#$product = $this->Product->findById($this->Product->id);
				$image_id = $this->Image->upload($this->data['Product']['image'], md5(time() ) );	
				$this->Product->saveField('image_id', $image_id);
				#$this->redirect(array('action'=>'view', $product['Product']['reference_number']) );
			} else {
				$this->Session->setFlash(__('The Product could not be saved. Please, try again.', true));
			}
		}
		$nodes = $this->Product->generatetreelist(null, null, null, '_', null);
		$images = $this->Product->Image->find('list');
		$types = $this->Product->types;
		$this->set(compact('nodes', 'images', 'types'));
	}
	function admin_nodes() {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		$this->set('nodes', $this->Product->generatetreelist(null, null, null, '_', null) );
	}
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Product', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->Product->id = $id;
			//weak condition, preferably use something like is_uploaded_file.  This condition is to remove the array element image if the user does not intend to change the image
			if(empty($this->data['Product']['image']['name']) ) unset($this->data['Product']['image']);
$this->log($this->data, 'activity');
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The Product has been saved', true));
				if(!empty($this->data['Product']['image']) ) {
					$image_id = $this->Image->upload($this->data['Product']['image'], md5(time() ) );
					$this->Product->saveField('image_id', $image_id);
				}
			} else {
				$this->Session->setFlash(__('The Product could not be saved. Please, try again.', true));
			} 
		}
		//get parent product name
		$this->data = $this->Product->read(null, $id);
		$nodes = $this->Product->generatetreelist(null, null, null, '_', null);
		$images = $this->Product->Image->find('list');
		$types = $this->Product->types;
		$this->set(compact('nodes','images', 'types'));
	}

	function admin_update($id = null) {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		if(!$id && empty($this->data)) {
			$message = array('message' => 'Error: No data supplied');
                }               
                if (!empty($this->data)) {
			$this->Product->id = $id;
                        if ($this->Product->save($this->data) ) {
				$message = array('message' => 'Saved.');	
                        } else {
				$message = array('message' => 'The Product could not be saved. Please, try again.');
                        }
                }
		$this->set('message', $message);
	}

	function admin_index() {
		$this->Product->recursive = 1;
		$this->Product->order = array('modified DESC');
		$products = $this->paginate('Product');
		foreach($products as &$product) {
			$parents = $this->Product->getpath($product['Product']['id']);
			$path = ""; //reset for next product
			foreach($parents as $parent) {
				$path .= ' > ' . $parent['Product']['name'];
			}
			$product['Product']['getpath'] = $path;
		}
		$this->set('products', $products);
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Product.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Product', true));
			$this->redirect($this->referer() );
		}
		if ($this->Product->del($id)) {
			$this->Session->setFlash(__('Product deleted', true));
			$this->redirect($this->referer() );
		}
	}
	function sidenav($type = 'him') {
		$this->Product->recursive = -1;
		if($type == 'all') {
			$conditions = array(
				'parent_id' => NULL,
			);
		} else {
			$conditions = array(
				'parent_id' => NULL,
				'type' => $type
			);
		}
		$toplevels = $this->Product->find('all', array(
			'conditions' => $conditions
		) );
		foreach($toplevels as $toplevel) {
			$children = $this->Product->children($toplevel['Product']['id'], true, null, 'weight ASC');
			foreach($children as $c) {
				$grandchildren = $this->Product->children($c['Product']['id'], true, null, 'weight ASC');
				$items[$toplevel['Product']['name']][$c['Product']['name']] = $grandchildren;
			}
		}
		$this->set('items', $items);
		$this->set('type', $type);
	}
	function admin_batch() {
		$nodes = $this->Product->generatetreelist(null, null, null, '_', null);
		$types = $this->Product->types;
		$this->set('nodes', $nodes);
		$this->set('types', $types);
		if(!empty($this->data['Product']) ) {
			$products = $this->Zip->upload($this->data['Product']);
			if($this->Product->saveAll($products['Product']) ) {
				$this->Session->setFlash(__('The Product has been saved', true));
			} else {
				debug($this->Product->invalidFields() );
			}
		}
	}
}
?>
