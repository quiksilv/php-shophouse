<?php echo $form->create('Node', array('action' => 'edit') ); ?>
<fieldset>
	<legend><?php __('Edit Node'); ?></legend>
<ul>
	<li><?php echo $form->input('subject'); ?></li>
	<li><div class="input text"><?php echo $form->label('content') . $form->textarea('content'); ?></div></li>
	<li><?php echo $form->input('link'); ?></li>
	<li><?php echo $form->input('published'); ?></li>
	<li><?php echo $form->submit(); ?></li>
</ul>
</fieldset>
<?php echo $form->end(); ?>
