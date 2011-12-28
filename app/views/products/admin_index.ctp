<?php echo $this->element('admin'); ?>
<div class="span-6" align="center"></div>
<div class="products index span-24 last">
<div align="right" class="actions" style="margin-bottom:10px">
	<?php echo $html->link(__('Batch Add', true), array('action' => 'batch')); ?>
	<?php echo $html->link(__('New Product', true), array('action' => 'add')); ?>
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
	<th><?php echo $paginator->sort('reference_number');?></th>
	<th><?php echo $paginator->sort('image');?></th>
	<th><?php echo $paginator->sort('name / description');?></th>
	<th><?php echo $paginator->sort('category');?></th>
	<!--th><?php echo $paginator->sort('price');?></th-->
	<th><?php echo $paginator->sort('published');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($products as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<span class="rn_editable" title="product<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['reference_number']; ?></span><span class="error" style="display:none"></span>
		</td>
		<td>
			<a rel="lightbox" href="/files/products/<?php echo $product['Image']['name']; ?>" ><img alt="" width="71" src="/files/products/thumbnails/<?php echo $product['Image']['name']; ?>" /></a>
		</td>
		<td>
			<span class="name_editable" title="product<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['name']; ?></span><span class="error" style="display:none"></span>
			<div class="desc_editable" title="product<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['description']; ?></span><span class="error" style="display:none"></div>
		</td>
		<td>
			<span class="selecteditable" title="product<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['getpath']; ?></span><span class="error" style="display:none"></span>
		</td>
		<!--td>
			<span class="editable" title="product<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['price']; ?></span><span class="error" style="display:none"></span>
		</td-->
		<td>
			<span title="product<?php echo $product['Product']['id']; ?>"><?php echo $form->checkbox('Product.published', array('checked' => ($product['Product']['published'] == '1') ? 'checked' : '' ) ); ?></span><span class="error" style="display:none"></span>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('edit.png'), array('action' => 'edit', $product['Product']['id']), null, null, null, true); ?>
			<?php echo $html->link($html->image('no.png'), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id']), null, true); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging span-24 last">
	<?php echo $paginator->prev('<< '.__('older entries', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('newer entries', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<script type="text/javascript">
$(document).ready(function() {
	/**$.get('/admin/products/nodes', function(data) {
		$(".selecteditable").editable({
			type:'select',
			options:data,
			onSubmit:function(content) {

			}	
		});
	});**/
       	$('#sidenav').load('/products/sidenav/all');
	$(function() {
		$('a[rel=lightbox]').lightBox();
	});
	$("input[type=checkbox]").click(function() {
		$.post('/admin/products/update/' + $(this).parent().attr("title").substring(7),
			{'data[Product][published]': $(this).attr('checked') ? 1 : 0 },
			function(data) {
				$this.parent().next().show();
				$this.parent().next().text(data.message);
			},
			'json'
		);
	});
/** to be optimized **/
	$(".name_editable").editable({
		onSubmit:function(content) {
			$.post('/admin/products/update/' + $(this).attr("title").substring(7), 
				{'data[Product][name]': content.current},
				function(data) {
					$this.next().show();
					$this.next().text(data.message);
					$this.next().fadeOut('slow') 
				},
				'json' 
			);
		}
	});
        $(".rn_editable").editable({
                onSubmit:function(content) {
                        $.post('/admin/products/update/' + $(this).attr("title").substring(7), 
                                {'data[Product][reference_number]': content.current},
                                function(data) {
                                        $this.next().show();
                                        $this.next().text(data.message);
                                        $this.next().fadeOut('slow') 
                                },
                                'json' 
                        );
                }
        });
        $(".name_editable").editable({
                onSubmit:function(content) {
                        $.post('/admin/products/update/' + $(this).attr("title").substring(7), 
                                {'data[Product][description]': content.current},
                                function(data) {
                                        $this.next().show();
                                        $this.next().text(data.message);
                                        $this.next().fadeOut('slow') 
                                },
                                'json' 
                        );
                }
        });
/** to be optimized **/

});
</script>
