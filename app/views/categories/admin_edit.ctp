<div class="categories form">
<?php echo $form->create('Category');?>
	<fieldset>
 		<legend><?php __('Edit Category');?></legend>
	<?php
		echo $form->input('parent_id');
		echo $form->input('name');
		echo $form->input('type');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Category.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Category.id'))); ?></li>
		<li><?php echo $html->link(__('List Categories', true), array('action' => 'index'));?></li>
	</ul>
</div>
