<?php
class UsersController extends AppController {

    var $name = 'Users';
	function beforeFilter() {
		$this->Auth->allow('login', 'register', 'forgotpassword');
		$this->Auth->fields = array(
                        'username' => 'email',
                        'password' => 'password'
                );
		$this->Auth->loginRedirect = $this->referer();
	}
	/**
	*  The AuthComponent provides the needed functionality
	*  for login, so you can leave this function blank.
	*/
	function login() {
		//-- code inside this function will execute only when autoRedirect was set to false (i.e. in a beforeFilter).
		    if ($this->Auth->user()) {
			if (!empty($this->data) && $this->data['User']['remember_me']) {
			    $cookie = array();
			    $cookie['email'] = $this->data['User']['email'];
			    $cookie['password'] = $this->data['User']['password'];
			    $this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
			    unset($this->data['User']['remember_me']);
			}
			$this->redirect($this->Auth->redirect());
		    }
		    if (empty($this->data)) {
			$cookie = $this->Cookie->read('Auth.User');
			if (!is_null($cookie)) {
			    if ($this->Auth->login($cookie)) {
				//  Clear auth message, just in case we use it.
				$this->Session->del('Message.auth');
				$this->redirect($this->Auth->redirect());
			    } else { // Delete invalid Cookie
				$this->Cookie->del('Auth.User');
			    }
			}
		    }
	}
	function admin_login() {
		$this->login();
	}
	function logout() {
		$this->Auth->logout();
		$this->redirect("/");
	}
        /**
         * Allows a user to sign up for a new account
        */
        function register()
        {
                // If the user submitted the form…
                if (!empty($this->data))
                {
                        // Turn the supplied password into the correct Hash.
                        // and move into the ‘password’ field so it will get saved.
                        if($this->data['User']['password'] == $this->Auth->password($this->data['User']['password2']) ) {
				if ($this->User->save($this->data) )
				{
					$user = $this->User->find('first', 
						array('condition' => array(
							'User.email' => $this->data['User']['email']
						) )
					);
					$this->Session->write('Auth.User', $user['User']);
					$this->Session->setFlash('Thanks for signing up!');
				}

				// The plain text password supplied has been hashed into the ‘password’ field so
				// should now be nulled so it doesn’t get render in the HTML if the save() fails
				$this->data['User']['password'] = null;
				$this->redirect("/");
			}
                }
        }
	function forgotpassword() {
		if(!empty($this->data['User']) ) {
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.email' => $this->data['User']['email']
				),
				'fields' => 'id',
				'recursive' => -1
			) );
			$newpassword = $this->generatePassword(8);
			$this->User->id = $user['User']['id'];
                        if ($this->User->saveField('password', $this->Auth->password($newpassword) ) ) {
				$this->Email->to = $this->data['User']['email'];
				$this->Email->subject = 'Sexshopsg password reset';
				$this->Email->replyTo = 'support@sexshopsg.com';
				$this->Email->from = 'admin@sexshopsg.com';
				$this->Email->template = 'default';
				$this->Email->sendAs = 'both';
##$this->Email->delivery = 'debug';
				$this->Email->send($newpassword);
##debug($this->Session->read('Message.email') );

                                $this->Session->setFlash('Random password sent to your email.');
				$this->redirect(array('controller' => 'nodes', 'action' => 'homepage') );
                        }
		}
	}
	function generatePassword ($length = 8)
	{
		$password = "";
		$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
		// we refer to the length of $possible a few times, so let's grab it now
		$maxlength = strlen($possible);
		// check for length overflow and truncate if necessary
		if ($length > $maxlength) {
			$length = $maxlength;
		}
		// set up a counter for how many characters are in the password so far
		$i = 0; 
		// add random characters to $password until $length is reached
		while ($i < $length) { 
			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, $maxlength-1), 1);
			// have we already used this character in $password?
			if (!strstr($password, $char)) { 
				// no, so it's OK to add it onto the end of whatever we've already got...
				$password .= $char;
				// ... and increase the counter by one
				$i++;
			}
		}
		// done!
		return $password;
	}
}
?>
