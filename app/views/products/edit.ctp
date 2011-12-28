<div class="products form">
<?php echo $form->create('Product');?>
	<fieldset>
 		<legend><?php __('Edit Product');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('category_id');
		echo $form->input('image_id');
		echo $form->input('reference_number');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('price');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Product.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Product.id'))); ?></li>
		<li><?php echo $html->link(__('List Products', true), array('action' => 'index'));?></li>
	</ul>
</div>
