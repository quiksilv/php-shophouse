<h3>Preview</h3>
<div id="preview" style="border:2px dotted #000;height:300px;width:964px;overflow: auto"></div>
<?php echo $form->create('Node', array('action' => 'edit') ); ?>
<fieldset>
	<legend><?php __('Edit Node'); ?></legend>
<ul>
	<li><?php echo $form->input('title'); ?></li>
	<li><div class="input text"><?php echo $form->label('content') . $form->textarea('content'); ?></div><?php echo $html->link('Preview', '#', array('id' => 'btnPreview') ); ?></li>
	<li><?php echo $form->input('link'); ?></li>
	<li><?php echo $form->input('published'); ?></li>
	<li><?php echo $form->submit(); ?></li>
</ul>
</fieldset>
<?php echo $form->end(); ?>

<script type="text/javascript">
	$('#btnPreview').click(function() {
		$('#preview').append($('#NodeContent').val() );
		return false;
	});
</script>
