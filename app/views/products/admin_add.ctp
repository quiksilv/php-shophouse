<div class="products form">
<?php echo $form->create('Product', array('enctype' => 'multipart/form-data') );?>
	<fieldset>
 		<legend><?php __('Add Product');?></legend>
	<ul>
		<li><?php echo $form->label('Parent') . $form->select('parent_id', $nodes); ?></li>
		<li><?php echo $form->label('Type') . $form->select('type', $types, 'military', array(), false); ?></li>
		<li><?php echo $form->label('Image') . $form->file('image'); ?></li>
		<li><?php echo $form->label('Reference Number') . $form->text('reference_number'); ?></li>
		<li><?php echo $form->label('Name') . $form->text('name'); ?></li>
		<li><?php echo $form->label('Description') . $form->textarea('description'); ?></li>
		<li><?php echo $form->label('Price') . $form->text('price'); ?></li>
		<li><?php echo $form->input('published'); ?></li>
	</ul>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Products', true), array('action' => 'index'));?></li>
	</ul>
</div>
