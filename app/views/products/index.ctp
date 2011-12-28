<?php 
	$type = $this->params['pass'][0]; 
?>
<div class="products index">
<h2><?php __(ucfirst($type) . ' Catalogue');?></h2>
<ul style="margin:0;padding:0">
	<?php foreach($products as $product): ?>
		<li style="display:inline-block">
			<div class="items">
				<?php if($product['Product']['totalchildren'] > 0): ?>
					<a href="<?php echo "/products/index/" . $type . "/" . $product['Product']['name']; ?>" ><img src="/files/products/optimal/<?php echo $product['Image']['name']; ?>" /></a>
				<?php else: ?>
					<a href="/products/view/<?php echo $product['Product']['reference_number']; ?>"><img src="/files/products/optimal/<?php echo $product['Image']['name']; ?>" /></a>
				<?php endif; ?>
				<div><?php echo $product['Product']['name']; ?></div>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
</div>
