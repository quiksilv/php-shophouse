<h2>Sitemap</h2>
<ul>
	<?php foreach($products as $product): ?>
		<li><?php echo $html->link($product['Product']['name'], '/products/view/' . $product['Product']['name']); ?></li>
	<?php endforeach; ?>
</ul>
