<?php
class Node extends AppModel {
	var $name = 'Node';
	var $validate = array(
		'subject' => array(
			'rule'=>array('minLength', 1), 
			'message'=>'Subject is required'
		),
		'content' => array(
			'rule'=>array('minLength', 1), 
			'message'=>'Content is required'
		)
	);
}
?>
