<?php 
class BlogsController extends AppController {
	
	var $name = 'Blogs';
	var $paginate = array(
		'limit' => 10
	);
	function beforeFilter() {
		$this->Auth->allow('sidenav', 'view', 'index');
	}
	function feed($frequency) {
		$this->layout = 'ajax';
		$this->Blog->recursive = 0;
		if($frequency == 'latest') {
			$limit = 2;
		}
		$blog = $this->Blog->find('all', array(
			'limit' => $limit
		) );
		$this->set('blogs', $blog);
	}
	function view() {

	}
	function index() {
		$this->Blog->recursive = 0;
		$this->set($this->paginate('Blog') );
	}
	function admin_index() {
		$this->Blog->recursive = 1;
		$this->Blog->order = array('modified DESC');
		$blogs = $this->paginate('Blog');
		$this->set('blogs', $blogs);
	}
	function admin_add() {
		if (!empty($this->data)) {
			$this->data['Blog']['user_id'] = $this->Session->read('Auth.User.id');
			$this->Blog->create();
			if ($this->Blog->save($this->data)) {
				$this->Session->setFlash(__('The Blog has been saved', true));
			} else {
				$this->Session->setFlash(__('The Blog could not be saved. Please, try again.', true));
			}
		}
	}
	function admin_edit($id = null) {
		if(!$id && empty($this->data) ) {
                        $this->Session->setFlash(__('Invalid Blog entry', true));
                        $this->redirect(array('action'=>'index'));
		}	
                if (!empty($this->data) ) {
                        $this->Blog->id = $id;
			$this->data['Blog']['user_id'] = $this->Session->read('Auth.User.id');
                        if ($this->Blog->save($this->data)) {
                                $this->Session->setFlash(__('The Blog entry has been saved', true));
                        } else {
                                $this->Session->setFlash(__('The Blog entry could not be saved. Please, try again.', true));
                        }
                }
		$this->data = $this->Blog->read(null, $id);
	}
	function admin_delete() {

	}
}
?>
