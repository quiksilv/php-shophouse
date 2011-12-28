<?php
class NodesController extends AppController {
	
	var $name = 'Nodes';
	var $paginate = array(
		'limit' => 10
	);
	function beforeFilter() {
		$this->Auth->allow('view', 'homepage');
	}
	function view($link = null) {
		$node = $this->Node->findByLink($link);
		$this->pageTitle = $node['Node']['title'];
		if(!$link) {
			$this->Session->setFlash(__('Invalid Page.', true));
			$this->redirect('/');
		}
		$this->set('node', $node );
	}
	function homepage() {}
	function admin_index() {
		$this->Node->recursive = 0;
		$nodes = $this->paginate('Node');	
		$this->set('nodes', $nodes);
	}
	function admin_edit($id = null) {
		if (!empty($this->data)) {
			if(!empty($id) )
				$this->Node->id = $id;
			$this->data['Nodes']['user_id'] = $this->Session->read('User.id');
			if ($this->Node->save($this->data)) {
				$this->Session->setFlash(__('The Node has been saved', true));
			} else {
				$this->Session->setFlash(__('The Node could not be saved. Please, try again.', true));
			} 
		}
		$this->data = $this->Node->read(null, $id);	
	}
	function admin_update($id) {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		if(!$id && empty($this->data)) {
			$message = array('message' => 'Error: No data supplied');
                }               
                if (!empty($this->data)) {
                        if ($this->Node->save($this->data)) {
				$message = array('message' => 'Saved.');	
                        } else {
				$message = array('message' => 'The Node could not be saved. Please, try again.');
                        }
                }
		$this->set('message', $message);
	}
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Node', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Node->del($id)) {
			$this->Session->setFlash(__('Node deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>
