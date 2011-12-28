<?php
class User extends AppModel {
	var $name = 'User';	
	var $validate = array(
                'password' => array(
                        'rule' => array('minLength', 6),
                        'message' => 'Your password must be at least 6 characters long',

                ),
                'email' => 'email',
	);
}	
?>
