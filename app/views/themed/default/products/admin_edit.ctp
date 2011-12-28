<div class="products form">
<?php echo $form->create('Product', array('enctype' => 'multipart/form-data') );?>
	<fieldset>
 		<legend><?php __('Edit Product');?></legend>
	<ul>
		<li><div class="input text"><?php echo $form->label('parent') . $form->select('parent_id', $nodes, $this->data['Product']['parent_id'], array(), true); ?></div></li>
		<!--li><?php echo $form->label('Type') . $form->select('type', $types, $this->data['Product']['type'], array(), false); ?></li-->
		<li><div class="input text">
			<img src="/files/products/thumbnails/<?php echo $this->data['Image']['name']; ?> " />
			<?php echo $form->label('change_image') . $form->file('image'); ?>
		</div>
		</li>
		<!--li><?php echo $form->input('reference_number'); ?></li-->
		<li><?php echo $form->input('name'); ?></li>
		<li><?php echo $form->input('description'); ?></li>
		<li><?php echo $form->input('price'); ?></li>
		<li><?php echo $form->input('tags'); ?></li>
		<li><?php echo $form->input('featured'); ?></li>
		<li><?php echo $form->input('published'); ?></li>
	</ul>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Product.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Product.id'))); ?></li>
		<li><?php echo $html->link(__('List Products', true), array('action' => 'index'));?></li>
	</ul>
</div>
