<?php
class Tag extends AppModel {
	var $name = 'Tag';
        var $hasAndBelongsToMany = array(
                'Product' =>
                        array('className'    => 'Product',
                             'joinTable'    => 'products_tags',
                             'foreignKey'   => 'tag_id',
                             'associationForeignKey'=> 'product_id',
                             'conditions'   => '',
                             'order'        => '',
                             'limit'        => '',
                             'unique'       => true,
                             'finderQuery'  => '',
                             'deleteQuery'  => '',
                       )
        );
}
?>
