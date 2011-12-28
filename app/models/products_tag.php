<?php
class ProductsTag extends AppModel {
	var $name = 'ProductsTag';
	var $belongsTo = array('Product', 'Tag');
}
?>
