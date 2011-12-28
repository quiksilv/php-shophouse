<h2>Search Catalogue</h2>
<div class="span-6"></div>
<div class="products index span-18 last">
<p style="color:#a8460b;font-weight:bold">
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr style="background:#4B4B4B;color:#fff">
        <th><?php echo $paginator->sort('reference_number');?></th>
        <th><?php echo $paginator->sort('image');?></th>
        <th><?php echo $paginator->sort('name / description');?></th>
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
                        <?php echo $html->link($product['Product']['reference_number'], '/products/view/' . $product['Product']['reference_number']); ?>
                </td>
                <td>
			<a rel="lightbox" href="/files/products/<?php echo $product['Image']['name']; ?>" ><img alt="" width="71" src="/files/products/thumbnails/<?php echo $product['Image']['name']; ?>" /></a>
		</td>
		<td>
			<?php echo $product['Product']['name']; ?>
			<?php echo $product['Product']['description']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php 
	if (count($products) < 1) {
		echo "Empty search results.";
	}
?>
</div>
<div class="paging span-24 last">
        <?php echo $paginator->prev('<< '.__('older entries', true), array(), null, array('class'=>'disabled'));?>
 |      <?php echo $paginator->numbers();?>
        <?php echo $paginator->next(__('newer entries', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(function() {
			$('a[rel=lightbox]').lightBox();
		});
	});
</script>
