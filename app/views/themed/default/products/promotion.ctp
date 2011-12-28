<div class="span-7">
<h2>LATEST ARRIVAL</h2>
	<ul style="margin:0;padding:0;">
		<li><h3><?php echo strtoupper($product['Product']['name']); ?></h3></li>
		<li><p><?php echo $text->truncate($product['Product']['description']); ?></p></li>
		<li>
			<form target="paypal" action="https://sandbox.paypal.com/cgi-bin/webscr" method="post">
				<span class="product_price">SGD<?php echo $product['Product']['price']; ?>
				<input type="image" src="/themed/default/img/btn_cart.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				</span>
				<input type="hidden" name="business" value="buyer_1271457638_biz@gmail.com">
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="add" value="1">
				<input type="hidden" name="item_name" value="<?php echo $product['Product']['name']; ?>">
				<input type="hidden" name="item_number" value="<?php echo $product['Product']['reference_number']; ?>">
				<input type="hidden" name="amount" value="<?php echo $product['Product']['price']; ?>">
				<img alt="" border="0" src="https://sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</li>
	</ul>
</div>
<div class="span-5 last" style="margin-top:10px">
	<img src="/files/products/optimal/<?php echo $product['Image']['name']; ?>" />
</div>
        <script src="/themed/default/js/minicart.js" type="text/javascript"></script>
        <script type="text/javascript">
            PAYPAL.apps.MiniCart.render();
        </script>
