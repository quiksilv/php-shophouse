<div id="contactform" class="span-12">
	<h2><?php __('Contact Us'); ?></h2>
	<?php echo $form->create('Contact'); ?>
	<fieldset>
	<ul>
		<li><?php echo $form->label('name') . $form->text('name'); ?></li>
		<li><?php echo $form->label('email') . $form->text('email'); ?></li>
		<li><?php echo $form->label('details') . $form->textarea('details'); ?></li>
		<li><?php echo $form->submit('Send'); ?></li>
	</ul>
	</fieldset>
	<?php echo $form->end(); ?>
</div>
