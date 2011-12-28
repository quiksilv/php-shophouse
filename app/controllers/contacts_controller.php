<?php
class ContactsController extends AppController {
        function beforeFilter() {
                $this->Auth->allow('add');
        }
	function add() {
		if ($this->RequestHandler->isPost()) {
			$this->Contact->set($this->data);
			if ($this->Contact->validates()) {
				//send email using the Email component
				$this->Email->to = 'jyent@singnet.com.sg'; 
				$this->Email->subject = 'Contact message from ' . $this->data['Contact']['name'];  
				$this->Email->from = $this->data['Contact']['email'];  
				
				$message = "Company: " . $this->data['Contact']['company'] . "\r\n" .
					   "Designation: " . $this->data['Contact']['designation'] . "\r\n" .
					   "Contact Number: " . $this->data['Contact']['contact_number'] . "\r\n" . 
					   "Message: " .  $this->data['Contact']['message'];
				
				if($this->Email->send($message) ) {
					$this->Session->setFlash('Thank you for your message.');
					$this->redirect('/');
				}
				
			}
		}
	}
}
?>
