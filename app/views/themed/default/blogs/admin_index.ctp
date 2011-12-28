<?php echo $this->element('admin'); ?>
<div class="span-6" align="center"></div>
<div class="blogs index span-18 last">
<div align="right" class="actions" style="margin-bottom:10px">
        <?php echo $html->link(__('New Blog entry', true), array('action' => 'add')); ?>
</div>
<p style="color:#a8460b;font-weight:bold">
	<?php
		echo $paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
	?>
</p>
<table cellpadding="0" cellspacing="0">
<tr style="background:#4B4B4B;color:#fff">
	<th><?php echo $paginator->sort('subject');?></th>
	<th><?php echo $paginator->sort('published');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach($blogs as $blog):
	$class = null;
	if($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td><?php echo $blog['Blog']['subject']; ?></td>
		<td>
			<span title="blog<?php echo $blog['Blog']['id']; ?>"><?php echo $form->checkbox('Blog.published', array('checked' => ($blog['Blog']['published'] == '1') ? 'checked' : '' ) ); ?></span><span class="error" style="display:none"></span>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('edit.png'), array('action' => 'edit', $blog['Blog']['id']), null, null, null, true); ?>
			<?php echo $html->link($html->image('no.png'), array('action' => 'delete', $blog['Blog']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $blog['Blog']['id']), null, true); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging span-24 last">
	<?php echo $paginator->prev('<< '.__('newer entries', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('older entries', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$("input[type=checkbox]").click(function() {
		$.post('/admin/blogs/update/' + $(this).parent().attr("title").substring(7),
			{'data[Blog][published]': $(this).attr('checked') ? 1 : 0 },
			function(data) {
				$(this).parent().next().text(data.message);
				$(this).parent().next().show();
				$(this).next().fadeOut('slow');
			},
			'json'
		);
	});
});
</script>
