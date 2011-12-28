<?php echo $form->create('Contact'); ?>
<fieldset>
	<legend><?php __('Contact Us'); ?>
<ul>
	<li><?php echo $form->input('name'); ?></li>
	<li><?php echo $form->input('email'); ?></li>
	<li><?php echo $form->input('details'); ?></li>
	<li><?php echo $form->submit('Send'); ?></li>
</ul>
</fieldset>
<?php echo $form->end(); ?>
