<?php echo $this->element('admin'); ?>
<div class="span-6"></div>
<div class="nodes index span-18 last">
<div align="right" class="actions" style="margin-bottom:10px">
        <?php echo $html->link(__('New Node', true), array('action' => 'edit')); ?>
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
        <th><?php echo $paginator->sort('title');?></th>
        <th><?php echo $paginator->sort('published');?></th>
        <th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i=0;
foreach ($nodes as $node):
	$class = null;
	if($i++ % 2) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class; ?>>
		<td>
			<?php echo $node['Node']['title']; ?>
		</td>
		<td>
			<span title="product<?php echo $node['Node']['id']; ?>"><?php echo $form->checkbox('Node.published', array('checked' => ($node['Node']['published'] == '1') ? 'checked' : '' ) ); ?></span><span class="error" style="display:none"></span>
		</td>
                <td class="actions">
                        <?php echo $html->link($html->image('edit.png'), array('action' => 'edit', $node['Node']['id']), null, null, null, true); ?>
                        <?php echo $html->link($html->image('no.png'), array('action' => 'delete', $node['Node']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $node['Node']['id']), null, true); ?>
                </td>
        </tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging span-24 last">
        <?php echo $paginator->prev('<< '.__('older entries', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $paginator->numbers();?>
        <?php echo $paginator->next(__('newer entries', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<script type="text/javascript">
	$('#sidenav').load('/products/sidenav/all');
        $("input[type=checkbox]").click(function() {
                $.post('/admin/nodes/update/' + $(this).parent().attr("title").substring(7),
                        {'data[Node][published]': $(this).attr('checked') ? 1 : 0 },
                        function(data) {
                                $this.parent().next().show();
                                $this.parent().next().text(data.message);
                        },
                        'json'
                );
        });
</script>
