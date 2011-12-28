<?php 
	$type = $this->params['pass'][0]; 
?>
<div class="products index">
<h2><?php __(ucfirst($type) . ' Catalogue');?></h2>
<ul style="margin:0;padding:0;width:750px">
	<?php foreach($products as $product): ?>
		<li style="float:left">
			<div class="items">
				<!-- categories with products -->
				<?php if($product['Product']['totalchildren'] > 0): ?>
					<a href="<?php echo "/products/index/" . $type . "/" . $product['Product']['name']; ?>" ><img src="/files/products/optimal/<?php echo $product['Image']['name']; ?>" /></a>
				<!-- just products or empty categories -->
				<?php else: ?>
					<a href="/products/view/<?php echo $product['Product']['reference_number']; ?>"><img src="/files/products/optimal/<?php echo $product['Image']['name']; ?>" /></a>
				<?php endif; ?>
				<div><?php echo $product['Product']['name']; ?></div>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
	<?php $paginator->options(array('url' => $this->passedArgs)); ?>
	<div class="paging span-24 last">
		<?php echo $paginator->prev('<<', array(), null, array('class'=>'disabled'));?>
	  	<?php echo $paginator->numbers(array('separator' => ' ') );?>
		<?php echo $paginator->next('>>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
