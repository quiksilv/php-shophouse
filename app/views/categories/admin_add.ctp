<div class="categories form">
<?php echo $form->create('Category');?>
	<fieldset>
 		<legend><?php __('Add Category');?></legend>
	<?php
		echo $form->label('Parent') . $form->select('parent_id', $parents);
		echo $form->input('name');
		echo $form->label('Type') . $form->select('type', $category_types);
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Categories', true), array('action' => 'index'));?></li>
	</ul>
</div>
