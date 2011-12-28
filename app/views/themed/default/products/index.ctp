<div id="sidenav" class="span-5"></div>
<?php 
	$type = $this->params['pass'][0]; 
?>

<div class="products index span-19">
<p id="breadcrumbs">YOU ARE AT: FOR <?php __(strtoupper($type));?></p>
<ul style="margin:0;padding:0">
	<?php foreach($products as $product): ?>
		<li>
			<ul class="item">
				<li><h3><?php echo $product['Product']['name']; ?></h3></li>
				<li><p><?php echo $text->truncate($product['Product']['description']); ?></p></li>
				<li>
					<form target="paypal" action="https://sandbox.paypal.com/cgi-bin/webscr" method="post">
						<span class="product_price">S$<?php echo $product['Product']['price']; ?>
							<!--?php echo $html->link($html->image('cart_pink.png') . 'ADD TO CART', '#', array('class' => 'addtocart'), null, false ); ?-->
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
					<li><a href="/products/view/<?php echo $product['Product']['reference_number']; ?>"><img src="/files/products/optimal/<?php echo $product['Image']['name']; ?>" /></a></li>
			</ul>
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
<script type="text/javascript">
	$(document).ready(function() {
		var params = "<?php echo $this->params['controller']; ?>";
		if(params == 'products') {
			$('#sidenav').load('/products/sidenav');
		}
	});
</script>
