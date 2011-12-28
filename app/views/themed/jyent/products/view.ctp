<div class="products view">
	<a rel="lightbox" href="/files/products/<?php echo $product['Image']['name']; ?>" ><img src='/files/products/optimal/<?php echo $product['Image']['name']; ?>' /></a>
	<div>Reference No.: <?php echo $product['Product']['reference_number']; ?></div>
	<div><?php echo $product['Product']['name']; ?></div>
</div>
<script type="text/javascript">
	$(function() {
		$('a[rel=lightbox]').lightBox();
	});
</script>
