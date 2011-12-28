<h2>Sitemap</h2>
<p style="color:#a8460b;font-weight:bold">
	<?php
		echo $paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
	?>
</p>
<ul class="menu">
	<?php foreach($products as $product): ?>
		<li><?php echo $html->link($product['Product']['name'], '/products/view/' . $product['Product']['name']); ?></li>
	<?php endforeach; ?>
</ul>
<div class="paging span-24 last">
	<?php echo $paginator->prev('<< '.__('newer entries', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('older entries', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
