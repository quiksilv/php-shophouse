<div class="blogs form">
<?php echo $form->create('Blog', array('enctype' => 'multipart/form-data') );?>
	<fieldset>
 		<legend><?php __('Add Blog entry');?></legend>
	<ul>
		<li><?php echo $form->input('subject'); ?></li>
		<li><?php echo $form->input('content'); ?></li>
		<li><?php echo $form->input('published'); ?></li>
	</ul>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Blog.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Blog.id'))); ?></li>
		<li><?php echo $html->link(__('List Blogs', true), array('action' => 'index'));?></li>
	</ul>
</div>
