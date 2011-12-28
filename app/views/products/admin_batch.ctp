<?php echo $form->create('Product', array('action' => 'batch', 'enctype' => 'multipart/form-data') ); ?>
<fieldset>
	<legend><?php __('Batch Add Products'); ?></legend>
	<ul>
		<li><?php echo $form->label('parent') . $form->select('parent_id', $nodes); ?></li>
		<li><?php echo $form->label('zip_file') . $form->file('archive'); ?></li>
		<li><?php echo $form->input('published', array('label' => 'Publish All') ); ?></li>
		<li><?php echo $form->submit(); ?></li>
	</ul>
	</fieldset>
	<?php echo $form->end(); ?>
