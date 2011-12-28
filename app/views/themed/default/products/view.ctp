<div id="sidenav" class="span-5"></div>
<div class="products view span-19 last">
	<div class="span-7">
		<img src='/files/products/<?php echo $product['Image']['name']; ?>' />
	</div>
	<div class="span-12 last">
		<h3><?php echo strtoupper($product['Product']['name']); ?></h3>
		<p><?php echo $product['Product']['description']; ?></p>

		<ul style="margin:0;padding:0;border-top:2px solid #5E5E5E;border-bottom:2px solid #5E5E5E;height:70px">
			<li style="margin:19px 10px 0 0;float:left"><span class="product_price">S$<?php echo $product['Product']['price']; ?></span></li>
			<li style="float:left;margin:10px 10px 0 0"><span class="product_price">QUANTITY: <?php echo $form->text('quantity', array('style' => 'width:80px;margin:0;height:30px;') ); ?></span></li>
                        <li style="float:left;margin:16px 0 0 0"><form target="paypal" action="https://sandbox.paypal.com/cgi-bin/webscr" method="post">
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

		</ul>

		<div class="span-1 append-17">
			<?php 
				if(!empty($neighbors['prev']['Product']) ) {
					echo $html->link('PREVIOUS', '/products/view/' . $neighbors['prev']['Product']['reference_number']); 
				}
			?>
		</div>
		<div class="span-1 last">
			<?php 
				if(!empty($neighbors['next']['Product']) ) {
					echo $html->link('NEXT', '/products/view/' . $neighbors['next']['Product']['reference_number']); 
				}
			?>
		</div>
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
