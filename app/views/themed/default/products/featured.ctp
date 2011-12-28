<h3>FEATURED PRODUCTS</h3>
	<?php 
		$i=0;
		foreach ($products as $product): 
	?>
		<?php $last = ($i%2 == 1) ? "prepend-3 last": ""; ?>
		<div class="span-6 <?php echo $last; ?>">
			<h4><?php echo strtoupper($product['Product']['name']); ?></h4>
			<div class="span-7 last"><?php echo $html->link($html->image("/files/products/optimal/". $product['Image']['name']), "/products/view/". $product['Product']['reference_number'], array(), null, false); ?></div>
			<div class="span-3 product_price">SGD<?php echo $product['Product']['price']; ?></div>
			<div class="span-3 last"><form target="paypal" action="https://sandbox.paypal.com/cgi-bin/webscr" method="post">
				<input type="image" src="/themed/default/img/btn_cart.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				</span>
				<input type="hidden" name="business" value="buyer_1271457638_biz@gmail.com">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="add" value="1">
				<input type="hidden" name="item_name" value="<?php echo $product['Product']['name']; ?>">
				<input type="hidden" name="item_number" value="<?php echo $product['Product']['reference_number']; ?>">
				<input type="hidden" name="amount" value="<?php echo $product['Product']['price']; ?>">
				<img alt="" border="0" src="https://sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form></div>
		</div>
		<?php $i++; ?>
	<?php endforeach; ?>
        <script src="/themed/default/js/minicart.js" type="text/javascript"></script>
        <script type="text/javascript">
            PAYPAL.apps.MiniCart.render();
        </script>
